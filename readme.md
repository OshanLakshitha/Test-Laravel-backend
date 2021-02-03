Android blog application and we will make our own REST API in Laravel.
We will also use .Jwt for authorization of our api and volley library for Rest api calls in our android app.

1). Go to laravel project install (laravel version 5.8).we use 5.8 bcz it has authenication included,).
2). Xampp server and create database and configure .env file.
3). Create authentication and migrate table ([cmd code : php artisan make:auth]/[cmd code : php artisan migrate]).
4). install JWT-javascript web token ([cmd code : composer require tymon/jwt-auth:1.*]).
5). some configuration is needed to enable jwt 
		[cmd code : php artisan vendor:publish]
		[using : [8 ] Provider: Tymon\JWTAuth\Providers\LaravelServiceProvider]
		[cmd : php artisan jwt:secret]
6). make Login route in api.php and also wirte its code controller .
    	[Create login controller cmd code : php artisan make:controller Api/AuthController]
		every time we login jwt provide us a token while we are login and make any request we needare loginand make any request we need pass that too.
7). make Register  function
		encrypt password before saving it in database
8). make logout function
	


