## General Queries
# See what cards from born of the gods have flavor text.
SELECT cardName, setName, flavorText 
FROM Cards 
WHERE setName = 'Born of the Gods' AND LENGTH(flavorText) > 0;

# Find recently made decks by good players younger than 24.
SELECT Decks.deckName, Players.playerUsername, Players.wins, Players.losses, Players.birthday 
FROM Decks, Players 
WHERE Players.wins > 900 AND Players.losses < 10 AND Players.birthday > '1990-01-01' AND Decks.creationDate > '2000-01-01';

SELECT Retailers.retailerName, Retailers.location 
FROM Retailers 
WHERE Retailers.rating > 4.0 AND Retailers.location LIKE 'Albuquerque%' OR Retailers.location LIKE 'Phoenix%' OR Retailers.location LIKE 'Tempe%';

## Join Queries
SELECT cards.cardName, cards.setName, rt.retailerName, se.price, se.quantity 
FROM Retailers rt 
JOIN Sells se ON rt.retailerName = se.retailerName 
JOIN Cards cards ON se.cardId = cards.cardId 
WHERE se.price > 10 AND se.quantity >= 18;

SELECT Players.playerUsername, Blogs.datePosted, Cards.cardName 
FROM Players 
NATURAL JOIN Blogs 
NATURAL JOIN TalkAboutCard 
NATURAL JOIN Cards 
WHERE Blogs.datePosted > '2009-01-01';
