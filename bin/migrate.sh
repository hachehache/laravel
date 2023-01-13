#!/bin/bash
# Supprime la BD et reconstruction de la base avec les tables
php artisan db:wipe && php artisan migrate
