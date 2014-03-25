'''
Created on Mar 10, 2014

@author: Lucas (lnunno@cs.unm.edu)
'''
import json

def escape(s):
    return s.replace('\n','\\n').replace("'","\\'")

class Set(object):
    
    def __init__(self, obj_dict):
        self.obj_dict = obj_dict
        
    def as_record(self):
        return '''\
('%s','%s',%s,%s)''' % (escape(self.obj_dict['name']), escape(self.obj_dict['releaseDate']), 'NULL', 'NULL')

class Card(object):
    
    id = 1
    
    def __init__(self, obj_dict, set_name):
        self.obj_dict = obj_dict
        self.set_name = set_name
        self.image_link = 'http://mtgimage.com/card/%s.jpg' % (obj_dict['imageName'])
        self.id = Card.id
        Card.id += 1
        
    def as_attrib(self,s):
        if not self.obj_dict.has_key(s):
            return 'NULL'
        else:
            return ("'%s'" % (escape(self.obj_dict[s])))
    
    def as_ls_attrib(self,ls):
        if not self.obj_dict.has_key(ls):
            return 'NULL'
        else:
            return ("'%s'" % (escape(' '.join(self.obj_dict[ls]))))
        
    def as_int(self,s):
        if not self.obj_dict.has_key(s):
            return 'NULL'
        try:
            return str(int(self.obj_dict[s]))
        except ValueError:
            return 'NULL'
    
    def as_record(self):
        return '''\
(%d,%s,'%s',%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,"%s")''' % (
                                self.id,
                                self.as_attrib('name'), 
                                escape(self.set_name), 
                                self.as_attrib('rarity'), 
                                self.as_attrib('manaCost'),
                                self.as_int('cmc'),
                                self.as_ls_attrib('types'),
                                self.as_ls_attrib('subtypes'),
                                self.as_ls_attrib('colors'),
                                self.as_attrib('text'),
                                self.as_attrib('flavor'),
                                self.as_int('power'),
                                self.as_int('toughness'),
                                self.as_attrib('artist'),
                                self.image_link
                                )
        
def make_insert_statement(records,table_name):
    return '''\
INSERT INTO %s VALUES 
\t%s;
''' % (
                                table_name,
                                ',\n\t'.join(records)
                                ) 


def get_card_and_set_lists(json_file_path):
    card_sets = []
    cards = []
    json_file = open(json_file_path)
    obj = json.load(json_file)
    json_file.close()
    for set_obj in obj.values():
        set_name = set_obj['name']
        s = Set(set_obj)
        card_sets.append(s)
        for c_dict in set_obj['cards']:
            c = Card(c_dict, set_name)
            cards.append(c)
    return card_sets, cards

def main():
    json_file_path = '../data/AllSets.json'
    card_sets, cards = get_card_and_set_lists(json_file_path)    
    set_records = map(lambda x:x.as_record(), card_sets)
    card_records = map(lambda x:x.as_record(), cards)
    set_insert_stmt = make_insert_statement(set_records, 'Sets').encode('utf-8')
    card_insert_stmt = make_insert_statement(card_records, 'Cards').encode('utf-8')
    with open('../output/insertCardsAndSets.sql', 'w') as f:
        f.write(card_insert_stmt)
        f.write(set_insert_stmt)
        
if __name__ == '__main__':
    main()
