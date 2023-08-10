

!!!!
Job listing application. 

A place to post jobs.

!!!!
Technologies:

Laravel 9 and MySQL.
Alpine.js

!!!!
Features:

Register/login


------

Laravel -> Fav server-side framework of Brad Traversy.

------
!!!!
Windows Configuration

Xampp gives apache (web server), php, mysql, phpmyadmin, etc.

Install composer (packet manager as npm)



Create new project:

composer create-project --prefer-dist laravel/laravel PROJECT_NAME



Edit virtual host




----

!!!!!!!!
Data

!!!!
Blade
blade is a template engine that laravel uses. blade.php extension.

!!!!
Routes

web.php (we work here, it loads all of our views or controllers)

Route::get('/', function () { // you can pass a req or res obj inside the function also
    return view('welcome'); // resource/views/welcome.etc
});

api.php (if we are creating a backend api)

Sanctum is an authentication library

!!!!
::

In PHP, the double colon :: is defined as Scope Resolution Operator. It used when when we want to access constants, properties and methods defined at class level. When referring to these items outside class definition, name of class is used along with scope resolution operator.

!!!!
=>

The double arrow operator, =>, is used as an access mechanism for arrays. This means that what is on the left side of it will have a corresponding value of what is on the right side of it in array context.

!!!!
->

The object operator, ->, is used in object scope to access methods and properties of an object. It’s meaning is to say that what is on the right of the operator is a member of the object instantiated into the variable on the left side of the operator.

!!!!
-> is used to call a method, or access a property, on the object of a class. I think is like the . of js.

=> is used to assign values to the keys of an array


!!!!!!!!
Helper methods for debuging

dd(); // die and dump
ddd(); // die, dump and debug


!!!!
eloquent ORM (Object relational mapping)(mapeo relacional de objetos)

Data comes through a model in laravel.

eloquent gives us a very eloquent way to deal with our database, we can do the model name like listing, then find or findall, etc. Like sequelize.
There is many types of filtering and sortering available to us.

to create an eloquent model we can do it with the terminal like this:

php artisan make:model (ModelName)

That would put a Model file called ModelName (We use Uppercase on the first letter for models and in singular) with just a basic Class that will have access to eloquent stuff
Lets do it manually first.



!!!!
Database config

config -> database.php


we dont need to creat tables, laravel have files called migrations that do that for us

php artisan migrate creates the table as it its in the users migration file, we can modified the file to add more columns or change some constraits or sql stuff like NOT NULL, etc.

!!!!
creating laragigs database with phpmyadmin

!!!!
artisan is the name of the console.

Artisan is the command line interface included with Laravel. Artisan exists at the root of your application as the artisan script and provides a number of helpful commands that can assist you while you build your application.
To view a list of all available Artisan commands, you may use the list command:
<!-- run --> php artisan list

php artisan list

!!!!
creating listings table in the terminal:
<!-- run --> php artisan make:migration create_listings_table

it creates a file and then we add the fields that we want to that file

!!!!!!!!
change in .env file DB_DATABASE to DB_DATABASE=laragigs (or the name of the database)

!!!!
to finally add the tables we need to run the migrate command which add all of the migrations files:
<!-- run --> php artisan migrate


!!!!
Creating dummy users using DatabaseSeeder.php file and UserFactory.php min 55
<!-- run --> php artisan db:seed

!!!!
refresh our database:
<!-- run --> php artisan migrate:refresh
refresh our database and then seed:
<!-- run --> php artisan migrate:refresh --seed 



!!!!!!!!!!!!
Creating a Listing model with artisan:
<!-- run --> php artisan make:model Listing


!!!!
fakeData.php a file with sample data


!!!!
Creating a factory
<!-- run --> php artisan make:factory ListingFactory


!!!!
creating a layout.blade.php file to be rendered in every page, then each individual page is going to render specific content depending on the url.


!!!!
Making every gig a component

creating a folder in views called components
creating file listing-card.blade.php



!!!!!!!!!!!!!!!!!!!!!!!!
1:35:00







