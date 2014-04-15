---- General Queries
SELECT cardName, setName, flavorText 
FROM Cards 
WHERE setName = 'Born of the Gods' AND LENGTH(flavorText) > 0 LIMIT 20;

SELECT Decks.deckName, Players.playerUsername, Players.wins, Players.losses, Players.birthday 
FROM Decks, Players 
WHERE Players.wins > 900 AND Players.losses < 10 AND Players.birthday > '1990-01-01' AND Decks.creationDate > '2000-01-01' LIMIT 20;

SELECT Retailers.retailerName, Retailers.location 
FROM Retailers 
WHERE Retailers.rating > 4.0 AND Retailers.location LIKE 'Albuquerque%' OR Retailers.location LIKE 'Phoenix%' OR Retailers.location LIKE 'Tempe%';

---- Join Queries
SELECT cards.cardName, cards.setName, rt.retailerName, se.price, se.quantity 
FROM Retailers rt 
JOIN Sells se ON rt.retailerName = se.retailerName 
JOIN Cards cards ON se.cardId = cards.cardId 
WHERE se.price > 10 AND se.quantity >= 18 LIMIT 20;

SELECT Players.playerUsername, Blogs.datePosted, Cards.cardName 
FROM Players 
NATURAL JOIN Blogs 
NATURAL JOIN TalkAboutCard 
NATURAL JOIN Cards 
WHERE Blogs.datePosted > '2009-01-01' LIMIT 20;

---- Union Query
SELECT setName FROM Cards
UNION 
SELECT setName FROM Sets LIMIT 20;

---- Group-by Query
SELECT retailerName, AVG(price) as averageMythicRarePrice 
FROM Sells NATURAL JOIN Cards 
WHERE Cards.rarity = 'Mythic Rare' 
GROUP BY retailerName LIMIT 20; 

---- Order-by Query
SELECT setName, COUNT(flavorText) AS flavorAmount
FROM Cards  
WHERE LENGTH(flavorText) > 0  
GROUP BY setName 
ORDER BY flavorAmount DESC LIMIT 20;

SELECT playerUsername, wins, draws, losses, ranking 
FROM Players 
ORDER BY wins DESC LIMIT 10;

---- Distinct Query
SELECT DISTINCT cardName
FROM Cards
WHERE rarity = 'Common' LIMIT 20;

---- Aggregate Query
SELECT Cards.cardName, Cards.setName, retailerName, quantity, MIN(price) as minimumPrice 
FROM Sells NATURAL JOIN Cards 
WHERE Cards.cardName = 'Brimaz, King of Oreskos' 
GROUP BY retailerName; 
