-- Indexing
SET profiling = 1;
SET profiling_history_size = 100;
-- Run before the indexes are created.
source query.sql;
CREATE INDEX cardNameIndex ON Cards(cardName);
CREATE INDEX winIndex ON Players(wins);
CREATE INDEX lossIndex ON Players(losses);
CREATE INDEX rarityIndex ON Cards(rarity);

-- Run after the indexes are created and compare the times.
source query.sql;
DROP INDEX cardNameIndex ON Cards;
DROP INDEX winIndex ON Players;
DROP INDEX lossIndex ON Players;
DROP INDEX rarityIndex ON Cards;

SHOW profiles;
SET profiling = 0;