#!/bin/bash
docker exec gfu_web_1 php artisan key:generate
docker exec gfu_web_1 php artisan migrate
docker exec gfu_web_1 php artisan cache:clear
docker exec gfu_web_1 chmod 777 storage -R

