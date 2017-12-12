<p align="center">
<img src="http://voom.be:12005/images/header/wpheader.jpg" />
</p>

## Waterpolo App + Backend
This is the backend API + website and admin-section for the waterpolo-app we created for the course Mobile App Projects 3 at Hogeschool Gent. 
It is written in Laravel + Vue as frontend JS lib. 

#### Backend
The backend supplies critical info to the Android app we created in conjunction: 
it delivers info about matches, teams, locations and more. 

#### Frontend
The website (http://voom.be:12005/) gives a live-feed of waterpolo matches, also gives info about players, teams, topscorers, locations, ... 

The adminsection (http://voom.be:12005/admin/- requires login) is CRUD-oriented for matches, teams, players and locations.

#### API
The API-routes can be found at: https://documenter.getpostman.com/view/2365272/waterpolo-api/7EK4VvF

## Docker
This app is contained in a docker-environment.

The different containers are:
* Workspace - makes artisan and other interaction possible with environment and app
* php-fpm container running PHP 7.1
* php-worker container - Runs PHP jobs
* nginx container - HTTP-server
* MySQL container - Database
* Selenium container - Browser testing


## Architectural overview
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

This MVC-app follows the guidelines of the Laravel-community.

* Routes: can be found under /routes/
* Models: can be found under /app/
* Views: /resources/views
* Controllers: can be found under /app/Http/Controllers
* Vue-components: /resources/assets/js/components
* tests: Browser (Selenium) and feature-tests: /tests/

## Contributors
This part of the project was completely made by **Matthias Vanooteghem**.

Other team members (Android app):
- Pieter Uyttersprot
- Timo Spanhove
- Laurent Deschryver

## Links
Website: http://voom.be:12005/

Adminsection: http://voom.be:12005/admin/

API: http://voom.be:12005/api/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
