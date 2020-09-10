## Introduction to Web Controller
Web_controller is a web site built on the framework of laravel. Web_controller is used to manage turning on and off devices.

## Guide web deployment on computers
- Clone source code from github:
```git clone https://github.com/hungitytng99/web_dieu_khien_compl.git```
- Run composer and npm to install the necessary packages in the project
```
composer install
```
- Go to mysql, create a new database named: `web_dieu_khien` with user name `user` . And set the highest authority for the user.
- Then we issue the following command to copy the env file:
```cp .env.example .env```
- Update your env file as follows:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=web_dieu_khien
DB_USERNAME=<user>
DB_PASSWORD= <"your password">
```
- Generate key for the project
```php artisan key:generate```
- Create sample tables and data for the database
```
php artisan migrate
php artisan db:seed
```
- Create serve start:
```php artisan serve```
- Log in as admin
   - user: admin
   - Password: 11091999
