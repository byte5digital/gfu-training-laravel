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
