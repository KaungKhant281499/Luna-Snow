# Laravel Installation:
* Open command line
* run=> 
    ```
        composer global require laravel/installer
    ```

# Other APIs and cdn Installation:
* Open window powershell in project file path
* run => composer require phpoffice/phpspreadsheet

# Storage Link Setup:
* Open window powershell in project file path
* run => 
    ```
        php artisan storage:link
    ```

# Database Setup:
* Create Database Name "lunasnowdatabase" in XAMPP and set the Language as "utf8mb4_unicode_520_ci"
In
* Open window powershell in project file path
* run => 
    ```
    php artisan migrate:fresh --seed
    ```

# Running Application:
* Open window powershell in project file path
* run => php artisan serve
* Open Browser 
* Enter "http://localhost:8000" in URL and run application
