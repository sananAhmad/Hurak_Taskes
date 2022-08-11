#Hurak taskes

Task#1 Show boxes 
every time double the boxes when scheculder runs every 1 minute and when boxes count reach 16 stop the scheduler 

Task # 2
will do this on late night......


# Installation

## Install all the dependencies using composer
composer update if composer.json.lock file exit otherwise composer install 


## Make .env file like .env.example and update following attributes in .env file according to your database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=



## Make sure to use mail credentials 
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=614f5b2780212b
MAIL_PASSWORD=12fd8312481e8c
MAIL_ENCRYPTION=tls


i'm using this credentials if you have your won credentials otherwise use this


# Generate a new application key
php artisan key:generate

# Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

#make assets

npm i and then npm run dev

#After installation

php artisan serve and open another tab where php artisan schedule:work




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
