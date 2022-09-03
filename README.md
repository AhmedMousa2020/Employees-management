## About Backend

Employees Management Web App

## prerequisites

- PHP version 7.3 or higher
- composer installing
- Node installing

## Setup

- Clone repository
- Create '.env' file from sample '.env.example'
- Update DB credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD etc)
- Ensure you have PHP and apache server running. You can get this via 
[Wamp](https://www.wampserver.com/en/) or [Xammp](https://www.apachefriends.org/), 
- Open terminal and run 
  - `composer install && npm install`
  - `php artisan key:generate`
  - `php artisan migrate`
  - `php artisan db:seed` (for dummy data)
  - `php artisan serve`
- Navigate to 'localhost:8000' and see application is running


   


