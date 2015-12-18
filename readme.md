
##Holiday Escape

Provides a holiday manager for a user to create holidays that contain a list
of escapes. The escapes are things that the user might do while on holiday.

The holidays are managed through the create holiday link where a list of the
users holidays is generated.

From that list the user can, add escapes, delete a holiday or update a holiday.

Add escapes takes the user to the create escape page where they are able too,
add new escapes, delete escapes or update escapes

Delete a holiday takes the user to a warning page that lists the attached escapes
and asks them if they really want to delete the holiday.

Update a holiday takes the user to a page where they can update the data in the
selected holiday.


###Packages used

Laravel Collective to create the forms
[Laravel Collective](http://laravelcollective.com/docs/5.1/html)

###Site structure

There are 2 main sections to the site they share the same program flow

####Holidays and escapes

Each has its own Controller and 3 blades, create update and Delete.
Each blade looks after creation updating and deletion of either holidays or
escapes

There are 2 routes that allow the escapes to be grouped under the holidays

###Database

users table contains all of the user data and has a one to many relationship
with holidays

holidays contains the holidays and has a many to many relationship with escapes

escape_holiday is a pivot table  between holidays and escapes

escapes table contains all the escapes and has a many to many relationship with
holidays



[p4.scottvjohnston.me](http://p4.scottvjohnston.me/)

[screen cast link is here](http://screencast.com/t/qOdtQD0sTiEW)
