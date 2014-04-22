cs564-mtg-db
============

Final project for CS564: Introduction to Databases.

## Project overview
The project is a web application that utilizes bootstrap 3 for the frontend UI and uses PHP with MySQL on the backend.

The main interaction that the user has with the application is by choosing a category: which is either Sets, Cards, Players, etc and then the user can either query on these datasets or make some modification to the underlying tables.

Every category is planned to have tabs for "Query", "Add", "Update", and "Delete" which will provide a frontend to make queries and modifications to the database from a user-friendly HTML5 frontend. 

Client side form validation is used with the HTML5 "required" attribute and validation for forms based on type (integer >= 0, birthday as a mm/dd/YYYY format, etc).

### Query functionality
Queries are performed on each category. For example, the interface for cards allows the user to search the Cards table and provide conditions that the DBMS will filter rows in the table based on. These conditions are specified by the user using the web form provided in the given "Query" tab.



