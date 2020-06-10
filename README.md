## Square1 Blog 

This Project was created in the Laravel 6.2 framework, with a MySQL database in order to meet the technical test with the specifications given in the following link:

- https://www.notion.so/Web-Developer-0cdf0bb1015d4e5c94b62b3fe61ee621

## Start Project
To start the project, after having cloned it, execute the instruction to create the DB and fill a seed:

                php artisan migrate --seed

## Importing posts
To carry out the import of the posts, a command was implemented that runs every hour, consumes the REST API and saves the records in the DB.

To execute this command locally you can run:

                php artisan schedule:run

Or add the following Cron entry to your server:

        * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

## User admin
The admin user is automatically created by the seed and is used for importing posts.
The E-Mail Address is admin@gmail.com and password is: 12345678

