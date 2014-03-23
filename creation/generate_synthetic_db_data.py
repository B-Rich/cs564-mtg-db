'''
Created on Mar 5, 2014

@author: Lucas Nunno (lnunno@cs.unm.edu)
'''
from random import choice, randrange, sample
from datetime import date
from mtg_card_data import get_card_and_set_lists, make_insert_statement, escape
import csv
import random

first_names = open('first_names.txt').read().splitlines()
last_names = open('last_names.txt').read().splitlines()
usernames = open('usernames.txt').read().splitlines()
words = open('words.txt').read().splitlines()

class Player(object):
    
    rankaccum = 1
    
    def __init__(self, username, first_name, last_name, birthday, wins=0, draws=0, losses=0, ranking=1000):
        self.username = username
        self.first_name = first_name
        self.last_name = last_name
        self.birthday = birthday
        self.wins = wins 
        self.draws = draws
        self.losses = losses
        self.ranking = Player.rankaccum
        Player.rankaccum += 1
    
    def __repr__(self):
        return self.username
    
    def as_record(self):
        return '''\
('%s','%s','%s','%s',%d,%d,%d,%d)''' % (
                                 self.username,
                                 self.first_name,
                                 self.last_name,
                                 self.birthday,
                                 self.wins,
                                 self.draws,
                                 self.losses,
                                 self.ranking
                                 )
                
def random_date():
    year = randrange(1950, 2010)
    month = randrange(1, 12)
    day = randrange(1, 28)
    return date(year, month, day)

def random_wlt():
    return randrange(0, 1000)

def make_random_person():
    return Player(choice(usernames)+str(random_wlt()), choice(first_names),
                  choice(last_names), random_date(),
                  random_wlt(), random_wlt(), random_wlt())

class Blog(object):
    
    def __init__(self, username, title, date_posted, content='NULL', summary='NULL'):
        self.username = username
        self.title = title
        self.date_posted = date_posted
        self.content = content
        self.summary = summary
    
    def __repr__(self):
        return ('%s By: %s' % (self.title, self.username))
    
    def as_record(self):
        return '''\
('%s','%s','%s','%s','%s')''' % (
                                 escape(self.username),
                                 escape(self.title),
                                 self.date_posted,
                                 escape(self.content),
                                 escape(self.summary)
                                 )
    
class Deck(object):
    
    def __init__(self, name, username, deck_format, deck_description, creation_date):
        self.name = name
        self.username = username
        self.deck_format = deck_format
        self.deck_description = deck_description
        self.creation_date = creation_date
        
    def as_record(self):
        return '''\
('%s','%s','%s','%s','%s')''' % (
                                 escape(self.name), 
                                 self.username, 
                                 self.deck_format, 
                                 escape(self.deck_description), 
                                 self.creation_date)
    
def random_words(max_len):
    ws = randrange(1, max_len)
    return ' '.join(sample(words, ws))

def make_random_blog(person_list):
    author = choice(person_list)
    return Blog(author.username, random_words(10).title(), random_date(), random_words(100), random_words(10))

def random_format():
    deck_formats = ['Standard', 'Legacy', 'Modern', 'Commander']
    return choice(deck_formats)

def make_random_deck(person_list):
    author = choice(person_list)
    return Deck(random_words(10).title(), author.username, random_format(), random_words(100), random_date())

class CardInDeck(object):
    
    def __init__(self, deck_name, player_username, card_id, quantity):
        self.deck_name = deck_name
        self.player_username = player_username
        self.card_id = card_id
        self.quantity = quantity
    
    def as_record(self):
        return '''\
('%s','%s',%d,%d)''' % (
                                 escape(self.deck_name),
                                 self.player_username,
                                 self.card_id,
                                 self.quantity
                                 )

class TalkAboutCard(object):
    
    def __init__(self, username, title, date_posted, card_id):
        self.username = username
        self.title = title
        self.date_posted = date_posted
        self.card_id = card_id
        
    def as_record(self):
        return '''\
('%s','%s','%s',%s)''' % (
                                 self.username,
                                 escape(self.title),
                                 self.date_posted,
                                 self.card_id
                                 )

class TalkAboutDeck(object):
    
    def __init__(self, username, title, date_posted, deck_name):
        self.username = username
        self.title = title
        self.date_posted = date_posted
        self.deck_name = deck_name
        
    def as_record(self):
        return '''\
('%s','%s','%s','%s')''' % (
                                 escape(self.username),
                                 escape(self.title),
                                 self.date_posted,
                                 escape(self.deck_name)
                                 )

def random_card_in_deck(deck, card_list):
    return CardInDeck(deck.name, deck.username, choice(card_list).id, 1) 

def random_ta_card(blog, card_list):
    return TalkAboutCard(blog.username, blog.title, blog.date_posted, choice(card_list).id)

def random_ta_deck(blog, deck_list):
    return TalkAboutDeck(blog.username, blog.title, blog.date_posted, choice(deck_list).name)

class Retailer(object):
    
    def __init__(self, name, location, rating):
        self.name = name
        self.location = location
        self.rating = rating
    
    def as_record(self):
        return '''\
('%s','%s',%1.1f)''' % (
                                 escape(self.name),
                                 escape(self.location),
                                 self.rating,
                                 )

def read_retailer_list(file_path):
    fieldnames = ['country', 'name', 'mailaddr', 'city', 'state', 'postcode', 'phonenum']
    retailers = []
    with open(file_path) as f:
        reader = csv.DictReader(f, fieldnames=fieldnames,delimiter='\t')
        for row in reader:
            location = '%s, %s %s %s' % (row['city'],row['state'], row['mailaddr'],row['country'])
            rating = random.random() * 5
            retailers.append(Retailer(row['name'],location,rating))
    return retailers

class Sells(object):
    
    def __init__(self,retailer,card,quantity):
        self.retailer = retailer
        self.card = card
        self.price = self.get_price_for(card)
        self.quantity = quantity
    
    def get_price_for(self,card):
        if not card.obj_dict.has_key('rarity'):
            return random.random()
        rarity = card.obj_dict['rarity']
        if rarity == 'Mythic Rare':
            return random.random() * 20.5
        elif rarity == 'Rare':
            return random.random() * 10.5
        elif rarity == 'Uncommon':
            return random.random() * 3
        elif rarity == 'Common':
            return random.random() * 1.5
        else:
            return random.random()
    
    def as_record(self):
        return '''\
('%s','%s',%d,%.2f,%d)''' % (
                                 escape(self.retailer.name),
                                 escape(self.retailer.location),
                                 self.card.id,
                                 self.price,
                                 self.quantity
                                 )
    
def random_sells(retailer,card_list):
    quantity = random.randint(1,20)
    return Sells(retailer,choice(card_list),quantity)
        
    
def main():
    num_people = 5000
    num_blogs = 2000
    num_decks = 200
    num_cards_in_deck = 60
    retailers = read_retailer_list('retailers.txt')
    def record_ls(ls):
        return map(lambda x: x.as_record(), ls)
    retailer_records = record_ls(retailers)
    people = [make_random_person() for _ in range(num_people)]
    blogs = [make_random_blog(people) for _ in range(num_blogs)]
    decks = [make_random_deck(people) for _ in range(num_decks)]
    people_records = record_ls(people)
    blog_records = record_ls(blogs)
    deck_records = record_ls(decks)
    set_list, card_list = get_card_and_set_lists('../data/AllSets.json')
    cards_in_decks = []
    for d in decks:
        for n in range(num_cards_in_deck):
            cd = random_card_in_deck(d, card_list)
            cards_in_decks.append(cd)
    cards_in_decks_records = record_ls(cards_in_decks)
    talk_about_cards = []
    talk_about_decks = []
    for b in blogs:
        for i in range(4):
            # Talk about this many cards and decks per blog.
            talk_about_cards.append(random_ta_card(b, card_list))
            talk_about_decks.append(random_ta_deck(b, decks))
    talk_about_cards_records = record_ls(talk_about_cards)
    talk_about_decks_records = record_ls(talk_about_decks)
    num_cards_per_retailer = 100
    sells = []
    for r in retailers:
        for i in range(num_cards_per_retailer):
            sells.append(random_sells(r, card_list))
    sells_records = record_ls(sells)
    with open('../output/insertData.sql','w') as out_file:
        out_file.writelines([
                            make_insert_statement(cards_in_decks_records,'CardInDeck'),
                            make_insert_statement(deck_records,'Decks'),
                            make_insert_statement(retailer_records,'Retailers'),
                            make_insert_statement(sells_records,'Sells'),
                            make_insert_statement(people_records,'Players'),
                            make_insert_statement(blog_records,'Blogs'),
                            make_insert_statement(talk_about_cards_records,'TalkAboutCard'),
                            make_insert_statement(talk_about_decks_records,'TalkAboutDeck')
                            ]
                            )
if __name__ == '__main__':
    main()
