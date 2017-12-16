<p align="center">
<img src="http://voom.be:12005/images/header/wpheader.jpg" />
</p>

## Projecten III: Mobile Apps
This is part of our assignment for the course Projecten III: Mobile Apps at Hogeschool Gent 2017 - 2018.

Our group is **WP_1020_MD_JB**

## Waterpolo App + Backend
This is the backend API + website and admin-section for the waterpolo-app we created for the course Mobile App Projects 3. 
It is written in Laravel 5.5 + Vue.js as frontend JS lib. 

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

* Routes: can be found in the folder /routes/
* Models: can be found in /app/
* Views: /resources/views
* Controllers: can be found in /app/Http/Controllers
* Listeners: in /app/Listeners
* Vue-components: /resources/assets/js/components
* Migrations & Seeders: /database/
* tests: Browser (Selenium) and feature-tests: /tests/

## Database Diagram
The DB-diagram can be viewed at: http://voom.be:12005/images/db/db_diagram.jpg

## Tests
<p align="center"><img src="http://voom.be:12005/images/tests/selenium.png"></p>

This webapp was tested using **feature (JSON & Web)** & **Selenium Browser tests** (Dockerized). These can be found in the folder /tests/

#### Feature tests
http://voom.be:12005/images/tests/unit1.jpg

http://voom.be:12005/images/tests/unit2.jpg

#### Selenium (Browser tests)
http://voom.be:12005/images/tests/dusk1.jpg

http://voom.be:12005/images/tests/dusk2.jpg

## Login
The admin-section (http://voom.be:12005/admin) can be accessed with these credentials:

Email: **lector@hogent.be**

Password: **DoYouEvenLaravel?**

## JWT-token
The API is protected with a JWT-token authentication mechanism.

## Languages
The webapp is currently translated in these languages:

* English
* Dutch / Nederlands
* French / Français

## FINA-sheets
The webapp / API also generates FINA-sheets in PDF-format

Example: http://voom.be:12005/pdf/finasheet-1513401166.pdf

## End of match event listeners
This webapp triggers 2 events when it gets the signal a waterpolo-match has ended.

* MatchSignedListener: will generate FINA-sheet and email it to the referee. Example email: http://voom.be:12005/images/tests/email_finasheet.jpg
* TableRankingListener: will calculate the standings in that particular division after the match

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
