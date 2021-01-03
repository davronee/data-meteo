# README #

This README would normally document whatever steps are necessary to get your application up and running.

### Please always check readme file changes ! 

### First steps: 27.10.2020 20:30 ###
```
composer install
npm install && npm run dev
composer dump-autoload
php artisan optimize:clear
php artisan migrate
php artisan db:seed
```

### 29.10.2020 00:10 ###
```
composer dump-autoload --ignore-platform-reqs
php artisan optimize:clear
php artisan migrate
```

### 24.11.2020 ###
```
composer dump-autoload --ignore-platform-reqs
php artisan optimize:clear
php artisan migrate
php artisan db:seed --class="ImportRegionAndDistrictSeeder"
```

### 08.12.2020 ###
```
composer install --ignore-platform-reqs
composer dump-autoload --ignore-platform-reqs
php artisan migrate
php artisan db:seed
php artisan optimize:clear
```

### 03.01.2021 ###
```
composer install --ignore-platform-reqs
composer dump-autoload --ignore-platform-reqs
php artisan migrate
php artisan db:seed
php artisan optimize:clear
```
