# Delete the tables before creating them.
DROP TABLE IF EXISTS Cards, CardInDeck, Decks, Sets, Players, Retailers, Sells, Blogs, TalkAboutCard,TalkAboutDeck;

CREATE TABLE Cards(
    cardId     INT PRIMARY KEY,
    cardName   VARCHAR(200),
    setName    VARCHAR(200),
    rarity     ENUM('Common','Uncommon','Rare','Mythic Rare','Special', 'Basic Land'),
    cost       VARCHAR(50),
    cmc        INT,
    type       VARCHAR(50),
    subtype    VARCHAR(50),
    colors     VARCHAR(200),
    ruleText   VARCHAR(20000),
    flavorText VARCHAR(20000),
    power      INT,
    toughness  INT,
    artist     VARCHAR(200),
    imageLink  VARCHAR(200)
);

DESCRIBE Cards; 

CREATE TABLE CardInDeck(
    deckName        VARCHAR(200),
    playerUsername  VARCHAR(200),
    cardId          INT,
    quantity        INT
);

DESCRIBE CardInDeck;

CREATE TABLE Decks(
    deckName        VARCHAR(200),
    playerUsername  VARCHAR(200),
    format          VARCHAR(50),
    deckDescription VARCHAR(3000),
    creationDate    DATE,
    PRIMARY KEY(deckName,playerUsername)
);

DESCRIBE Decks;

CREATE TABLE Sets(
    setName         VARCHAR(200) PRIMARY KEY,
    dateReleased    DATE,
    setDescription  VARCHAR(3000),
    logoLink        VARCHAR(200)
);

DESCRIBE Sets;

CREATE TABLE Retailers(
    retailerName    VARCHAR(200),
    location        VARCHAR(200),
    rating          DECIMAL(2,1),
    PRIMARY KEY(retailerName,location)
);

DESCRIBE Retailers;

CREATE TABLE Sells(
    retailerName    VARCHAR(200),
    location        VARCHAR(200),
    cardId          INT,
    price           DECIMAL(8,2),
    quantity        INT,
    PRIMARY KEY(retailerName,location,cardId,price)
);

DESCRIBE Sells;

CREATE TABLE Players(
    playerUsername  VARCHAR(200) PRIMARY KEY,
    firstName       VARCHAR(20),
    lastName        VARCHAR(20),
    birthday        DATE,
    wins            INT,
    draws           INT,
    losses          INT,
    ranking         INT
);

DESCRIBE Players;

CREATE TABLE Blogs(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     DATE,
    summary        VARCHAR(1000),
    content        VARCHAR(5000),
    PRIMARY KEY(playerUsername,title,datePosted)
);

DESCRIBE Blogs;

CREATE TABLE TalkAboutCard(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     VARCHAR(200),
    cardId         INT
);

DESCRIBE TalkAboutCard;

CREATE TABLE TalkAboutDeck(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     VARCHAR(200),
    deckName       VARCHAR(200)
);

DESCRIBE TalkAboutDeck;