#!/bin/bash

docker exec gfu_web_1 php artisan ide-helper:generate
docker exec gfu_web_1 php artisan ide-helper:models -W -M
