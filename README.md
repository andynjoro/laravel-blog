# Laravel Blog
## Overview

A simple blogging application built with Laravel.

## Tech
- [Dasisy UI](https://github.com/saadeghi/daisyui) - Tailwind CSS UI components
- Redis - For caching

And of course Laravel using Sail to take advantage of Docker features.

## Installation

This application has been designed with Docker in mind. The following steps assume that you have Docker Compose installed.

Clone this repository on your local environment
```sh
git clone https://github.com/andynjoro/laravel-blog.git
```

Navigate to application directory
```sh
cd laravel-blog
```

Rename .env.example to .env
```sh
mv .env.example .env
```

Run Laravel Sail
```sh
composer install
./vendor/bin/sail up
```

Compile assets
```sh
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Once the application's Docker containers have been started, you can access the application in your web browser at: http://localhost.

## Setup
Set your cache driver to redis in your .env file
```sh
CACHE_DRIVER=redis
```

Set your post import URL in your .env file
```sh
POSTS_IMPORT_URL=https://sq1-api-test.herokuapp.com/posts
```

Create an admin user to be used for imports 
```sh
./vendor/bin/sail artisan user:create-admin
```

## Importing posts

Ensure that an admin user has been set up for importing posts.

Import posts by running the command below:
```sh
./vendor/bin/sail artisan posts:import
```

## Testing

Post tests have beenn included and can be run using the command below:

```sh
./vendor/bin/sail artisan test 
```
