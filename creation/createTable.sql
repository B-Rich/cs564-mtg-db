# Delete the tables before creating them.
DROP TABLE IF EXISTS Cards, CardsInDeck, Decks, Sets, Players, Retailers, Sells, Blogs;

CREATE TABLE Cards(
    cardName   VARCHAR(200),
    setName    VARCHAR(200),
    rarity     ENUM('Common','Uncommon','Rare','Mythic'),
    type       VARCHAR(50),
    subtype    VARCHAR(50),
    color      VARCHAR(200),
    ruleText   VARCHAR(200),
    flavorText VARCHAR(200),
    power      INT,
    toughness  INT,
    artist     VARCHAR(200),
    imageLink  VARCHAR(200),
    PRIMARY KEY(cardName,setName)
);

CREATE TABLE CardsInDeck(
    deckName        VARCHAR(200),
    cardName        VARCHAR(200),
    setName         VARCHAR(200),
    quantity        INT,
    PRIMARY KEY (deckName,cardName,setName)
);

CREATE TABLE Decks(
    deckName        VARCHAR(200),
    playerUsername  VARCHAR(200),
    format          VARCHAR(50),
    deckDescription VARCHAR(3000),
    creationDate    DATE,
    PRIMARY KEY(deckName,playerUsername)
);

CREATE TABLE Sets(
    setName         VARCHAR(200) PRIMARY KEY,
    dateReleased    DATE,
    setDescription  VARCHAR(3000),
    logoLink        VARCHAR(200)
);

CREATE TABLE Retailers(
    retailerName    VARCHAR(200) PRIMARY KEY,
    location        VARCHAR(200),
    rating          DECIMAL(2,1)
);

CREATE TABLE Sells(
    retailerName    VARCHAR(200),
    cardName        VARCHAR(200),
    setName         VARCHAR(200),
    price           DECIMAL(8,2),
    quantity        INT,
    PRIMARY KEY(retailerName,cardName,setName,price)
);

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

CREATE TABLE Blogs(
    playerUsername VARCHAR(200),
    title          VARCHAR(200),
    datePosted     DATE,
    summary        VARCHAR(1000),
    content        VARCHAR(5000),
    PRIMARY KEY(playerUsername,title,datePosted)
);