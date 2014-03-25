# Create the database and populate with all data.
# WARNING: Deletes all prior data in these tables. Builds the database FROM SCRATCH.
source createTable.sql
source insertCardsAndSets.sql
source insertData.sql
