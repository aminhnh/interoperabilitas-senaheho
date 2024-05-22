## Steps to run project

1. Clone the project<br>
```git clone https://github.com/aminhnh/interoperabilitas-senaheho.git```

2. Change directory to the project directory <br>

3. Install composer packages <br>
```composer install```<br>

4. Run the migrations<br>
```php artisan migrate```<br>

5. Before seeding, run the sql command below in phpmyadmin: <br>
```
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;
```
6. Run the commands below in the project directory<br>
```php artisan db:seed```<br>
```php artisan serve```<br>

