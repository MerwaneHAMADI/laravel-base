Overview
========

We will use Docker to setup containers to run our Laravel application. This should be a simple implementation to get developers up and running ASAP. Additionaly these containers can be used in any staging and production environments.

Setup
=======

Checkout code from git repository.

Install docker and docker-compose.

<!-- Not needed as we include composer install in the app
Use docker composer image to install framework packages.

**# docker run --rm -v $(pwd):/app composer install**

Update permissions of files on your local system. For Linux use:

**# sudo chown -R $USER:$USER ~/your-app-directory**-->

To build the Application and it's containers, in your terminal go to the root directory and run:

**# docker-compose up**

**# docker-compose exec app composer install**

At this stage you will have a working application at <a href="http://127.0.0.1" target="_blank">http://127.0.0.1</a> and can use your favorite IDE to develop in your local environment's git cloned directory.

3- Create a database seeder class which reads/parses the csv file to populate the database table you created from the migration above.

**To look at the database, go to http://127.0.0.1 and click on login to login as a standard user with those logins :**
**user : jonathan@user.com**
**password : govzilla**
**You will see the dashboard. Then click on Employees and verify that the seed worked.**

Laravel DB Setup
================

We will run the Laravel migration command to setup database tables. This executes the command within the application container.

**# docker-compose exec app php artisan migrate**

<!--
Laravel Authentication

**# docker-compose exec app composer require laravel/ui --dev**

**# docker-compose exec app php artisan ui vue --auth**
-->

**user : jonathan@admin.com**

**password : govzilla**

Cleanup
=======

## Removing your container images

The best way to do that is with

**# docker system prune -a**

## Deleting locally stored volumes

Find the volume with the following command.

**# docker volume ls**

Delete the volume with:

**# docker volume rm VOLUMENAME**


I implemented a way for admin to create users, roles and permissions. Verify that :
A regular user can't create an admin user ( he would then be able to perform update and delete operations, we don't want that)

An admin user can read/update/create/delete admins, users and employees.
