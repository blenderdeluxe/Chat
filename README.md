Deprecated

# Laravel Chat

Laravel Chat is a package to make on your own app a chat with multi users and private conversations.

This package use redis and socket.io to better performance.


## Installation

## Required

Install redis on your server.

```
nmp install socket.io
nmp install ioredis
```

## Download and Installation
Download laravel chat package to your project
```
composer require "socieboy/chat" "dev-master"
```
Then execute the command
```
Composer update
```
Place the service provider on your  app.php config file.
```
Socieboy\Chat\ChatServiceProvider::class,
```

## Migrations
Now execute the command.
```
php artisan chat:tables
```
Then run
```
php artisan migrate
```

## Update laravel auth
Update the AuthenticatesAndRegistersUsers trait of the laravel auth controller.
This trait is updated to fire events when a new user has been logged in and out.
```
Socieboy\Chat\Traits\AuthenticatesAndRegistersUsers
```

## Styles and Scripts

Publish the scripts and styles with the command
```
php artisan vendor:publish
```
Set up on your master view page the fallow code.
On the meta tags area between the \<head>\</head> tags.

```
<meta name="token" id="token" value="{{ csrf_token() }}">
```
Also you have to add the style scripts.
```
<link rel="stylesheet" href="{{ url('css/chat.css') }}"/>
```
Same thing with the JS files required, make sure to place them in end before to close the \<body>\<\body> tag.
```
<script src="{{ asset('js/socket.io.js') }}"></script>
<script src="{{ url('js/chat.js') }}"></script>
```


# Usage

Run redis on your server
```
redis-server
```
Then on your project folder execute this code
```
node socket.js
```
