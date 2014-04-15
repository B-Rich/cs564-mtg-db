---- Data modification queries
-- INSERT queries
INSERT INTO Sets VALUES ('Journey into Nyx','2014-05-02','Your path has taken you to Theros, a plane beset by chaos. A mortal Planeswalker has forced his way into the pantheon of gods, who are outraged and threatened by his ascent. Drawing on the power of the god-realm of Nyx, they send creatures of pure enchantment to crush mortal armies. The heroes of Theros strive mightily as they face their greatest challenge: standing their ground against the gods. There can be no peace until the upstart is thrown down. Here on Theros, you will forge a destiny to echo through the ages. Perhaps you will lead your fellow mortals on the battlefield, bolstered by your courage—or champion the pantheon as they struggle to right the natural order. Embrace your fate and become a legendary hero fit to rival the gods.','http://wiki.mtgsalvation.com/images/thumb/b/b2/JOUsymbol.jpg/22px-JOUsymbol.jpg');

SELECT * FROM Sets WHERE setName = 'Journey into Nyx';

INSERT INTO Players VALUES ('lnunno','Lucas','Nunno','1990-11-01',1000,0,0,1);

SELECT * FROM Players WHERE playerUsername = 'lnunno'; 

-- UPDATE queries
UPDATE Sells, Cards
SET price = 0.25
WHERE Sells.cardId = Cards.cardId
AND Cards.rarity = 'Uncommon'
AND Sells.retailerName = 'Active Imagination';

SELECT s.retailerName, c.cardName, c.rarity, s.price FROM Sells s,Cards c WHERE s.cardId = c.cardId AND retailerName = 'Active Imagination' AND c.rarity='Uncommon';

SELECT playerUsername, wins, draws, losses, ranking FROM Players LIMIT 10;

UPDATE Players AS p,
    (
        SELECT @rownum:=@rownum+1 rownum, playerUsername, wins
        FROM Players, (SELECT @rownum := 0) rn
        ORDER BY wins DESC
    ) AS pr
SET p.ranking = pr.rownum
WHERE p.playerUsername = pr.playerUsername;

SELECT playerUsername, wins, draws, losses, ranking 
FROM Players 
ORDER BY wins DESC LIMIT 10;

UPDATE Players
SET wins = 0, losses = 0, draws = 0, ranking = 999;

-- DELETE queries
DELETE b, tc, td
FROM Blogs b JOIN TalkAboutCard tc ON b.title = tc.title JOIN TalkAboutDeck td ON b.title = td.title
WHERE b.title='Neapolitan Deflects Edited Schmalz Languorously Brawl';

-- This should be the empty set.
SELECT * FROM Blogs b JOIN TalkAboutCard tc ON b.title = tc.title JOIN TalkAboutDeck td ON b.title = td.title
WHERE b.title='Neapolitan Deflects Edited Schmalz Languorously Brawl';

DELETE r, s 
FROM Retailers r NATURAL JOIN Sells s
WHERE r.retailerName = "Collector's Hideaway";

-- This should be the empty set.
SELECT * FROM Retailers WHERE retailerName = "Collector's Hideaway";

SELECT * FROM Sells WHERE retailerName = "Collector's Hideaway";
