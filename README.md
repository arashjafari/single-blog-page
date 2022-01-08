# Single page blog [Laravel + Vue]

## Requirements
* [Docker](https://www.docker.com)

## Preview

![](/screenshot/homepage.png)

## Quick Start

### Installation Instructions

0. Clone or download this repository, then go to the project path and run the following commands

1. Run `cd docker`

2. Rename `.env.example` file to `.env`. Update `.env` to your specific needs

   * If you change database config in `docker-compose.yml` then you need to update `.env` file with new values.

3. Run `docker-compose up -d --build`

   * Run `docker ps` 

    It is expected that you will have these containers in results:
       my-nginx
       my-mysql
       blog-app.

4. Run `docker exec -it  blog-app bash`
   
5. Run `composer install`
6. RUN `php artisan migrate`
7. RUN `npm install`
8. RUN `npm run dev`

9. Run Tests `vendor/bin/phpunit`

After installation, you can access with this address [http://127.0.0.1:8080/](http://127.0.0.1:8080/) on your browser.
