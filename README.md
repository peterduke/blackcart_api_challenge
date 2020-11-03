

## How to set up the code

Execute these commands from the shell:

`git clone git@github.com:peterduke/blackcart_api_challenge.git`

`cd blackcart_api_challenge`

`composer install`

Create a database and add a `.env` file with the credentials. The seeded database is necessary for the API to function and for the tests to run. 

`php artisan migrate --force --seed`

## How to run the tests

`php artisan test`