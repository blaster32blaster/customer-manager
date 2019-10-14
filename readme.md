# Customer Manager

## Docker Instructions (preferred)
- clone package git@github.com:blaster32blaster/customer-manager.git
- navigate to root project directory
- Run Command : docker-compose up
- navigate to http://localhost:8080

## Other build and web serving instructions
- clone package git@github.com:blaster32blaster/customer-manager.git
- set up local host and webserver
- navigate to root project directory
- Run Command : composer install
- Run Command : npm install
- Run Command : php artisan migrate:install
- Run Command : php artisan migrate
- Run Command : php artisan db:seed
- navigate to project host