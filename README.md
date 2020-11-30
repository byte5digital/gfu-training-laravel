# GFU Training

## Scripts

-   start.sh => Startet das gesamte Docker Setup inkl. MariaDB Datenbank
-   update.sh => führt migrations durch und erstellt, sofern nicht vorhanden, einen APP Key
-   shell.sh => Öffnet eine Shell auf dem Webserver (Docker)

## Add Auth Facades

-   composer require laravel/ui "^1.0" --dev
-   php artisan ui vue --auth

## Add Helper classes (barryvdh/laravel-ide-helper)

- helper.sh => erstellt die Klassenhelper, sowie die Model Helper Klassen

## Adding Sample Data to Database

After the migration is complete, you can seed the tables with sample data if needed.

The sample data contains:
- 3 Tags
- 15 Default Users
- 15 Articles (one for each User)
- 1 Admin User

To seed the database please run:
```
php artisan db:seed
```


### Logging in with Sample Admin

The following data can be used to login with the sample admin user to view the example admin panel:

E-Mail | Password
------------ | -------------
admin@example.com | password

