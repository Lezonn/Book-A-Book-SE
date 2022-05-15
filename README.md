# Book A Book
A website to help customers see the availability / stock of books at various branch of a bookstore. Then the customer can choose the desired book and the selected branch will keep the book then the customer comes to pick up and make transactions (SELF PICK UP).

## How to run project in your local
  <strong>Configure the database</strong>
  * Open XAMPP and start Apache & MySQL
  * Open phpmyadmin
  * Create new database book_a_book_se in phpmyadmin

  <strong>Setup the project</strong>
  * Clone project to any folder
  * Open git bash / command prompt in your project folder
  * Write command below <br />
    composer install <br />
    copy .env.example .env <br /><br />
  * Open project in visual studio code
  * Open .env file, update database configuration like below<br />
    DB_DATABASE=book_a_book_se<br />
    DB_USERNAME=root<br />
    DB_PASSWORD= <br /><br />
  * Write command below in visual studio code terminal / command prompt / git bash <br />
    php artisan key:generate (Generate APP_KEY in .env) <br />
    php artisan migrate (Create database table) <br />
    php artisan serve (Run the application) <br /><br />
  * For default xampp configuration you can access the website at the link below <br />
    (http://localhost:8000/)
## Tools
- Bootstrap 5
- Composer
- PHP 8.X
- Laravel 9.x
- XAMPP

## Authors
| Name                            | NIM        | Class                        |
| :-----------------------------  | :--------- | :--------------------------- |
| Leonard Zonaphan                | 2440035791 | Software Engineering - LI01  |
| Jonathan Wijaya                 | 2440040066 | Software Engineering - LI01  |
| Karin Northus                   | 2440062086 | Software Engineering - LI01  |
