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
    ruleText   TEXT,
    flavorText TEXT,
    power      INT,
    toughness  INT,
    artist     VARCHAR(200),
    imageLink  VARCHAR(200)
);

CREATE TABLE CardInDeck(
    deckName        VARCHAR(200),
    playerUsername  VARCHAR(200),
    cardId          INT,
    quantity        INT
);

CREATE TABLE Decks(
    deckName        VARCHAR(200),
    playerUsername  VARCHAR(200),
    format          VARCHAR(50),
    deckDescription TEXT,
    creationDate    DATE,
    PRIMARY KEY(deckName,playerUsername)
);

CREATE TABLE Sets(
    setName         VARCHAR(200) PRIMARY KEY,
    dateReleased    DATE,
    setDescription  TEXT,
    logoLink        VARCHAR(200)
);

CREATE TABLE Retailers(
    retailerName    VARCHAR(200),
    location        VARCHAR(200),
    rating          DECIMAL(2,1),
    PRIMARY KEY(retailerName,location)
);

CREATE TABLE Sells(
    retailerName    VARCHAR(200),
    location        VARCHAR(200),
    cardId          INT,
    price           DECIMAL(8,2),
    quantity        INT,
    PRIMARY KEY(retailerName,location,cardId,price)
);

CREATE TABLE Players(
    playerUsername  VARCHAR(200) PRIMARY KEY,
    firstName       VARCHAR(20),
    lastName        VARCHAR(20),
    birthday        DATE,
    wins            INT DEFAULT 0,
    draws           INT DEFAULT 0,
    losses          INT DEFAULT 0,
    ranking         INT DEFAULT 999
);

CREATE TABLE Blogs(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     DATE,
    summary        TEXT,
    content        TEXT,
    PRIMARY KEY(playerUsername,title,datePosted)
);

CREATE TABLE TalkAboutCard(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     VARCHAR(200),
    cardId         INT
);

CREATE TABLE TalkAboutDeck(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     VARCHAR(200),
    deckName       VARCHAR(200)
);