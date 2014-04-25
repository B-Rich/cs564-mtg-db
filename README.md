cs564-mtg-db
============
**By: Lucas Nunno**

Final project for CS564: Introduction to Databases.

## Project overview
The project is a web application that utilizes bootstrap 3 for the frontend UI and uses PHP with MySQL on the backend.

The main interaction that the user has with the application is by choosing a category: which is either Sets, Cards, Players, etc and then the user can either query on these datasets or make some modification to the underlying tables.

Every category is planned to have tabs for "Query", "Add", "Update", and "Delete" which will provide a frontend to make queries and modifications to the database from a user-friendly HTML5 frontend. 

Client side form validation is used with the HTML5 "required" attribute and validation for forms based on type (integer >= 0, birthday as a mm/dd/YYYY format, etc).

## Query error reporting
After a query or modification is sent to the database, the results page will show an alert with either success (green), warning (yellow), or error (red). The results page also shows the query that was executed on the mysql server. A warning is usually only issued when a SELECT query is performed and results in 0 rows returned. An error indicates an error with the query that was performed on the mysql server, for example, if you attempt to create a user with the same username as an existing user, this system will tell you that this is not possible since username is the primary key. 

## Functionality overview 

### Part 5 deliverable specifications
The project specification states that we need **at least three** alternative options offered to the user. Below is a list of the alternatives that are currently implemented.

1. Sets -> List Sets. Lists all sets and their release dates.
2. Cards -> Find card -> Query tab. Card queries.
3. Players -> Find player -> Query tab. Player queries.
4. Players -> Find player -> Add tab. Player insert.
5. Players -> Find player -> Update tab -> Reset player rankings
6. Players -> Find player -> Update tab -> Calculate player rankings
7. Retailers -> Find retailer -> Query tab. Retailer queries.
8. Retailers -> Find retailer -> Add tab. Retailer insert.

### Query functionality
Queries are performed on each category. For example, the interface for cards allows the user to search the Cards table and provide conditions that the DBMS will filter rows in the table based on. These conditions are specified by the user using the web form provided in the given "Query" tab.

In the backend, these web form values are posted to a query results page where PHP translates fields that are provided to an SQL query. 

#### Range search
An interesting feature I've provided is allowing range values, for example power or toughness for a creature can be provided and then the dropdown allows the user to select the range for these values (=,<,>,<=,>=). This functionality is provided when other numerical values are needed for queries as well.

#### Fuzzy search
Another notable feature that I've provided is for queries on fields that may have a large amount of text (for example, Rule Text, Flavor Text for Cards or Location for Retailers) are automatically converted to query on the value that the user has input as a LIKE statement. For example, if the user queries for "Trample" on Rule Text in the Card query form, this is converted to the statement:

    SELECT ...
    FROM Cards
    WHERE ... AND ruleText LIKE "%Trample%";
    
So that the results are hopefully more in line with what the user was looking for.

**Queries are currently implemented for**:
* Cards
* Players
* Retailers

### Insert functionality
Insert functionality is somewhat more straight-forward than the other operations, but it is provided for a few categories.

**Inserts are currently implemented for**:
* Players
* Retailers

### Update functionality
Users can reset player rankings and re-calculate player rankings through the update tab provided on the players page. The rank calculation is calculated from the total number of wins and set accordingly. This was included as a particularly complex update operation for the part 4 turnin.

### Delete functionality
Currently not implemented, but will be represented in some form for the final project demo.





