Setup
=======

Clone the project and go to the root.

To build the Application and it's containers, in your terminal go to the root directory and run:

**# docker-compose up**

**# docker-compose exec app composer install**

Migrate :

**# docker-compose exec app php artisan migrate**

Seed :

**# docker-compose exec app php artisan db:seed**

Requirements
=======

1- Download or clone the repository from https://github.com/govzilla/laravel-base. Follow the readme.md file to get your instance running. **DONE**

2- Once you have a working version of Laravel, you will be required to create a laravel database migration based on the provided Employee csv (link below).  Look at the laravel documentation on https://laravel.com/ to understand database migrations and how to create one. **DONE**

3- Create a database seeder class which reads/parses the csv file to populate the database table you created from the migration above. 
**To look at the database, go to http://127.0.0.1/simplecrud and login as a standard user with those logins :**
**user : user@user.com**
**password : user1!**
**You will see the dashboard. Then click on Employees and verify that the seed worked.**

4-Next, define some form of user management. A good baseline is to start with the laravel authentication mechanisms (ref https://laravel.com/docs/6.x/authentication).  The only users you need concern yourself with are standard users and admins.**DONE**

5-Create a menu and view to show the employee data form the database above in a table as a list of names (first name and last name columns sorted ascending by last name).**DONE**

6-Create a view that displays the detailed employee data when clicking on a row (or first name or last name) in the view above.
**Just navigate on the app and verify if everything is correct**

Create an  Admin view (or set of views) to perform CRUD operations to manipulate the employee data in the database.

**Log out and use those logins**

**user : admin@admin.com**

**password : admin1**

**Verify that you can perform all the crud operations on Employees**

**BONUS**

I implemented a way for admin to create users, roles and permissions. Verify that : 
A regular user can't create an admin user ( he would then be able to perform update and delete operations, we don't want that)
An admin user can read/update/create/delete admins, users, roles, permissions and employees
