#!/bin/bash

# equivalent de migrate:fresh
#php artisan db:wipe
#php artisan migrate

php artisan migrate:fresh
# sans parametre, c'est  la classe DatabaseSeeder qui est utilisé
php artisan db:seed
