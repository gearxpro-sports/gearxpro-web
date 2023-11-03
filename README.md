
# GearXpro

## Installation
- Clone this repo in your environment
- In root directory copy `.env.example` file and rename it to `.env`
- Open your `.env` file and set the following variables according to your environment configuration
    - `APP_URL`
    - `DB_HOST`
    - `DB_PORT`
    - `DB_DATABASE`
    - `DB_USERNAME`
    - `DB_PASSWORD`

#### Authorization for MediaLibrary package
- In root directory, create a new file called `auth.json` and paste this lines in:
  ```
  {
    "http-basic": {
      "satis.spatie.be": {
        "username": "info@algomera.it",
        "password": "03nDqRv6cWmvwswBgJJzceLNz4E9XeHr2uXkgi4IZ8hopT6aPr8eZM5UR24GfGzd"
      }
    }
  }
  ```
#### Commands for installing composer and node packages
- (First time) In root directory run the following commands in order:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate:refresh --seed` (this command creates basic models)
    - `npm install`
    - `npm run dev` (in one Terminal window)
    - `php artisan serve` (in another Terminal window)
- (All other times) In root directory run the following commands in order:
    - `npm run dev` (in one Terminal window)
    - `php artisan serve` (in another Terminal window)

#### Accessing
- From the homepage of the site, click the "user" icon in the upper right corner. You will be redirected to the login page:
  - SUPERADMIN:
  ```
  email: admin@example.test
  password: password
  ```
  - RESELLER:
  ```
  email: reseller@example.test
  password: password
  ```
  - CUSTOMER:
  ```
  email: customer@example.test
  password: password
  ```
