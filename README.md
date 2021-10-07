# Laravel Starter App

A simple app that can be used as a startup point for a bigger project. It includes:

* Authentication
* Roles
* Settings
* Under maintenance
* Block users
* User last seen
* Actions, Filters, helper functions imported from WordPress ```app/Helpers/WP```

### Installation

* Create a database and update .env file
* Run: ```composer install```
* Run: ```npm install```
* Run: ```npm run prod```
* Run: ```php artisan migrate``` (base db tables) or, ```php artisan migrate --seed``` (To use demo data)

### Demo data

* Admin user: admin@local.host, password: admin
* Member user: member@local.host, password: member

### Views

* Can be found under ```{root}/views``` (higher precedence)
* Can be found under ```{root}/resources/views``` (lower precedence)
* Path: /maintenance, name: under_maintenance
* Path: /, name: site.frontpage
* Path: /home, name: home

### Resources

* Can be found under ```resources/compile```.
* Base js: ```resources/compile/main.js```
* Base scss: ```resources/compile/styles.scss```
* Output: ```public/dist```

### Vendor

* Bootstrap v5 - loaded in ```resources/compile/styles.scss```
* Popper js v2 - loaded in ```resources/compile/styles.scss```
* Font Awesome v5 - loaded in ```views/layouts/frontend.blade.php```
* jQuery v3 - loaded in ```views/layouts/frontend.blade.php```

### Controllers

* ApiController
* HomeController
* UnderMaintenanceController

### Middleware

* DenyBlockedUsers
* DenyRequestsUnderMaintenance
* UpdateLastSeen

### Providers

* UnderMaintenanceProvider
