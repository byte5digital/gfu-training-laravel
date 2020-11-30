#!/bin/bash
FILE=.env
if [ -f "$FILE" ]; then
    echo "env File exists"
else
    cp .env.example .env
fi
composer install
docker-compose -p gfu -f docker-compose.yml up --build --remove-orphans
