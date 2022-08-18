<p align="center">
  <img src="/public/img/logoW.png" width="100" height="100" />
</p>

# peer-to-peer-car-location
This application is made using Laravel 8.4 with jetstrem kit that come with livewire components. the idea of this project is to locate your car peer to peer, that means if you have a car and it stays free in somedays, you can publish it to be located in those specific days and times.

# Requirements
- php >= 7.4
- Laravel = 8.4
 
# Instruction to install the application
```
git clone ...
cd peer-to-peer-car-location
composer install
npm install
php artisan migrate
```
> Don't forget to copy the env file and enter a valid database name before migration.  
> After creating .env file please run this command to generate an application key 
```
php artisan key:generate
```
> The last thing to do is to insert the smtp mail trap to catch emails
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME= your username
MAIL_PASSWORD= your password
MAIL_ENCRYPTION=tls
```

# usage
```
php artisan serve
php artisan schedule:work
```
> The second command to activate the CRON jobs that runs each day.  
> Register to the application with 2 account, one with the partner role and the other with the user role, to test all the functionalities.

# Functionalities
- Publish your location offers.
- Make your offers premium.
- Filter and take the offer that suits your needs.
- Get notified when someone accept you offer by email.
- Each user have its own profile containing its information and reviews from other users.
- In the end of each location a feedback form is send to both car owner and beneficer.
