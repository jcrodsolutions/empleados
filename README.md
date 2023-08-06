# Empleados
This project is result of a Youtube tutorial I followed then made my own custom mods.

Empleados is a simple employee manager built using Laravel and Filamentphp,

## Requirements
- PHP 8.2

## Package versions
- Laravel 10
- Filamentphp 2

## How to use
- Create your database and database user
```
create database empleados;
use empleados;
create user user@localhost identified by 'password';
grant all privileges on empleados.* to user@localhost;
flush privileges;
```
- Copy .env.example to .env and customize it to match your needs 
`# cp .env.example .env`
- Install packages
`# composer install`
- Run migrations and seeder to create smaple data
`# php artisan migrate:fresh --seed`

