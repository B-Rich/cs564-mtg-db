## Relational schema
<strong>CS 564 Project Part 3</strong>

<strong>By: Lucas Nunno (lnunno@cs.unm.edu)</strong>

Note that the image attribute is a link to the image for the card as an internal/external URL represented as a string.

Cards(
	<u>name</u>:string,
	<u>set</u>:string,
	ruleText:string,
	image:string,
	manaCost:integer,
	type:string,
	subtype:string,
	power:integer,
	toughness:integer,
	rarity:string,
	color:string,
	flavorText:string,
	artist:string
)

Decks(
	<u>name</u>:string,
	<u>playerUsername</u>:string,
	format:string,
	description:string,
	creationDate:date
)

Sets(
	<u>name</u>:string,
	logo:string,
	dateReleased:date,
	description:string
)

Players(
	<u>username</u>:string,
	firstName:string,
	lastName:string,
	birthday:date,
	wins:integer,
	draws:integer,
	losses:integer,
	ranking:integer
)

Retailers(
	<u>name</u>:string,
	<u>cardName</u>:string,
	<u>price</u>:float,
	rating:float,
	location:string,
)

Blogs(
	<u>authorUsername</u>:string,
	<u>title</u>:string,
	<u>datePosted</u>:date,
	content:string,
	summary:string
)
