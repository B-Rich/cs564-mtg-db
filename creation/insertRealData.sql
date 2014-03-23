# Cards
INSERT INTO Cards VALUES 
(1,'Acolyte\'s Reward','Born of the Gods','Uncommon','1W',2,'Instant',NULL,'White','Prevent the next X damage that would be dealt to target creature this turn, where X is your devotion to white. If damage is prevented this way, Acolyte\'s Reward deals that much damage to target creature or player. (Each White in the mana costs of permanents you control counts toward your devotion to white.',NULL,NULL,NULL,'Slawomir Maniak','http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=378373&type=card'),
(2,'Aerie Worshippers','Born of the Gods','Uncommon','3U',4,'Creature','Human Cleric','Blue','Inspired — Whenever Aerie Worshippers becomes untapped, you may pay 2Blue. If you do, put a 2/2 blue Bird enchantment creature token with flying onto the battlefield.','They can conjure stars from a clear sky.',2,4,'Mike Sass','http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=378402&type=card'),
(3,'Akroan Conscriptor','Born of the Gods','Uncommon','4R',5,'Creature','Human Shaman','Red','Heroic — Whenever you cast a spell that targets Akroan Conscriptor, gain control of another target creature until end of turn. Untap that creature. It gains haste until end of turn.','The time to serve is now.',3,2,'James Ryman','http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=378459&type=card'),
(4,'Akroan Phalanx','Born of the Gods','Uncommon','3W',4,'Creature','Human Soldier','White','Vigilance 2Red: Creatures you control get +1/+0 until end of turn.','Shields up, spears out, heels set, hearts firm.',3,3,'Steve Prescott','http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=378374&type=card'),
(5,'Akroan Skyguard','Born of the Gods','Common','1W',2,'Creature','Human Soldier','White','Flying Heroic — Whenever you cast a spell that targets Akroan Skyguard, put a +1/+1 counter on Akroan Skyguard.','"Trust me. When you have earned a god\'s favor, you\'ll know."',1,1,'Mark Winters','http://gatherer.wizards.com/Handlers/Image.ashx?multiverseid=378375&type=card');
# Decks
INSERT INTO Decks VALUES
('MyDeck','lnunno','Standard','This is a bad deck','2014-03-04'),
('Goblin Barrage','mbarthlem','Legacy','This has a bunch of goblins in it.','2010-01-02'),
('Living End','JokG12','Modern','Multicolored modern deck with a twist.','2012-04-11'),
('Necro Reboot','notacanadian24','Legacy','Multicolored modern deck with a twist.','2012-04-11'),
('Garruks Rampage in the Forest','sacoolio90','Commander','Using a bunch of planeswalkers together.','2014-01-03'),
('WhiteWalkers','Sporter2','Standard','Game of thrones reference.','2013-10-31');
# CardInDeck
INSERT INTO CardInDeck VALUES
('WhiteWalkers','Sporter2',1,4),
('WhiteWalkers','Sporter2',2,4),
('WhiteWalkers','Sporter2',3,4),
('Zombies!','Robot Screams',1,4),
('Zombies!','Robot Screams',2,4),
('Zombies!','Robot Screams',3,2),
('Zombies!','Robot Screams',4,4);
# Sets
INSERT INTO Sets VALUES
('Journey into Nyx','2014-05-02','Last expansion in Theros block','http://wiki.mtgsalvation.com/images/thumb/b/b2/JOUsymbol.jpg/22px-JOUsymbol.jpg'),
('Born of the Gods','2014-02-07','No longer content to walk the planes of the Multiverse seeking pleasure, the planeswalker Xenagos returns to Theros to become the god of revels.[3] The boundaries that separate everyday existence from Nyx are growing dangerously thin. Strange creatures of enchantment, called Nyxborn or Born of the Gods, are pouring into the mortal world as Xenagos threatens to disrupt the very nature of the plane. Mogis, the god of slaughter sends hordes of mortal and Nyxborn minotaurs against the human cities Akros, Meletis and Setessa. Elspeth Tirel leads an army of heroes to break the minotaur siege at Akros. The humans were victorious, but the victory celebration after the battle becomes the ultimate ritual to launch Xenagos into Nyx as a god. Elspeth is blamed for his ascension and driven away in disgrace.','http://wiki.mtgsalvation.com/images/thumb/1/12/BNGsymbol.jpg/23px-BNGsymbol.jpg'),
('Theros','2013-09-27','Theros is watched over by a pantheon of 15 powerful gods. The gods, though residing in Nyx, are able to take on many forms and often walk among mortals. Each also has a unique color identity. The five core gods are mono-coloured and make up the central pillars of the Theran belief system. The colour identities of these five are: Heliod (white), Thassa (blue), Erebos (black), Purphoros (red), and Nylea (green). The ten minor gods represent the two colour pairings and will be introduced in Born of the Gods and Journey into Nyx.','http://wiki.mtgsalvation.com/images/thumb/e/ee/Therossymbol.jpg/22px-Therossymbol.jpg'),
('Dragon\'s Maze','2013-05-03','The Implicit Maze is a system of mana paths or leylines through the guildgates and districts of Plane that has manifested after the Guildpact was destroyed. On instruction of Niv-Mizzet and using Jace Beleren\'s notes, it was discovered by Ral Zarek. The maze was created by Azor I to be revealed in case the Guildpact dissolved. In this way, the founder of the Azorius Senate tried to foster an atmosphere of peaceful collaboration. At the end of the maze in the Forum of Azor lies great power. In order for it to be solved, all the guilds of Ravnica must participate at once. Niv-Mizzet has announced that each guild will has send one champion as its delegate in the running of the maze. At an appointed time, the champions meet at the Transguild Promenade, and embark on a race through the twists and turns of the maze. The one who triumphs, gains the power behind it for his or her guild. Others fall to its dangers.','http://wiki.mtgsalvation.com/images/thumb/d/dc/DGM_symbol.jpg/29px-DGM_symbol.jpg'),
('Gatecrash','2013-02-01','Gatecrash contains 249 cards (101 commons, 80 uncommons, 53 rares, 15 mythic rares), including randomly inserted premium versions of all cards in the set. Like Return to Ravnica, the preceding expansion set, Gatecrash focuses on the guild system and multicolor cards. The five guilds returning in Gatecrash are the Boros Legion, House Dimir, Gruul Clans, Orzhov Syndicate, and Simic Combine. [1] [2] Despite being a large expansion, Gatecrash does not contain any basic lands (Return to Ravnica has some extra). [3] The set features two planeswalkers; one, Gideon, Champion of Justice, is an established planeswalker, [4] whilst the other, Domri Rade is a new. [5] The expansion symbol is a pointed arch of a gate.','http://wiki.mtgsalvation.com/images/thumb/9/98/GTC_symbol.jpg/33px-GTC_symbol.jpg');
# Retailers
INSERT INTO Retailers VALUES
('OldSchoolGaming','Toledo, Ohio',4.5),
('Top Deck Gamers','San Antonio, Texas',3.5),
('Brainstorm Games','Eugene, Oregon',2.5),
('Evolution Gaming','Los Angeles, California',4.3),
('Twin Suns','Albuquerque, New Mexico',4.8);
# Sells
INSERT INTO Sells VALUES
('Twin Suns','Albuquerque, New Mexico',1,0.15,5),
('OldSchoolGaming','Toledo, Ohio',1,0.25,3),
('Top Deck Gamers','San Antonio, Texas',1,0.04,8),
('Brainstorm Games','Eugene, Oregon',1,0.10,10),
('Evolution Gaming','Los Angeles, California',1,0.15,20),
('Twin Suns','Albuquerque, New Mexico',2,0.15,7),
('OldSchoolGaming','Toledo, Ohio',2,0.25,2),
('Top Deck Gamers','San Antonio, Texas',2,0.04,10),
('Brainstorm Games','Eugene, Oregon',2,0.10,15),
('Evolution Gaming','Los Angeles, California',2,0.15,25);
# Players
INSERT INTO Players VALUES
('lnunno','Lucas','Nunno','1990-11-01',1000,0,0,1),
('mbarthlem','Mikey','Bart','1989-03-01',999,1000,0,2),
('notacanadian24','Marcus','Eh','1969-08-01',600,200,123,3),
('Sporter2','Bob','Loblaw','1974-05-01',123,123,123,4),
('Robot Screams','Rob','Smith','1930-11-01',45,10,20,5);
# Blogs
INSERT INTO Blogs VALUES
('mbarthlem','This is why I love goblins','1999-01-23','An in depth article about goblin decks.','Some content'),
('lnunno','This is why I hate goblins','1999-01-30','An in depth article about hating goblin decks.','Some content'),
('lnunno','This is why I love zombies','2010-10-30','An in depth article about loving zombie decks.','Some content'),
('mbarthlem','This is why I hate zombies','2010-11-02','An in depth article about hating zombie decks.','Some content'),
('notacanadian24','I\'m not really Canadian','2010-11-02','Everyone thinks I\'m Canadian, but I\'m really not.','Some content');
# TalkAboutCard
INSERT INTO TalkAboutCard VALUES
('mbarthlem','This is why I love goblins','1999-01-23',1),
('mbarthlem','This is why I love goblins','1999-01-23',2),
('lnunno','This is why I hate goblins','1999-01-30',3),
('lnunno','This is why I hate goblins','1999-01-30',4),
('notacanadian24','I\'m not really Canadian','2010-11-02',5),
('notacanadian24','I\'m not really Canadian','2010-11-02',1);
# TalkAboutDeck
INSERT INTO TalkAboutDeck VALUES
('mbarthlem','This is why I love goblins','1999-01-23','Goblin Barrage'),
('mbarthlem','This is why I love goblins','1999-01-23','WhiteWalkers'),
('lnunno','This is why I hate goblins','1999-01-30','Goblin Barrage'),
('lnunno','This is why I hate goblins','1999-01-30','WhiteWalkers'),
('notacanadian24','I\'m not really Canadian','2010-11-02','Goblin Barrage'),
('notacanadian24','I\'m not really Canadian','2010-11-02','WhiteWalkers');

# Make sure the values where inserted.
SELECT * FROM Cards;
SELECT * FROM CardInDeck;
SELECT * FROM Decks;
SELECT * FROM Sets;
SELECT * FROM Retailers;
SELECT * FROM Sells;
SELECT * FROM Players;
SELECT * FROM Blogs;
SELECT * FROM TalkAboutCard;
SELECT * FROM TalkAboutDeck;