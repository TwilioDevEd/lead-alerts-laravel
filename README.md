# Instant lead alerts example implemented with PHP and Laravel

This demo application shows how to implement instant lead alerts using Java and
Servlets. Notify sales reps or agents right away when a new lead comes in for
a real estate listing or other high value channel.

[Read the full tutorial here](https://www.twilio.com/docs/tutorials/walkthrough/lead-alerts/php/laravel)!


[![Build Status](https://travis-ci.org/TwilioDevEd/lead-alerts-laravel.svg)](https://travis-ci.org/TwilioDevEd/lead-alerts-laravel)

1. Clone this repository and `cd` into it.
   ```
   git clone git@github.com:TwilioDevEd/lead-alerts-laravel.git
   cd lead-lerts-laravel
   ```

1. Install the application's dependencies with [Composer](https://getcomposer.org/)

  ```bash
  $ composer install
  ```

1. Copy the sample configuration file and edit it to _match your configuration_.

   ```bash
   $ cp .env.example .env
   ```

1. Generate an `APP_KEY`.

   ```bash
   $ php artisan key:generate
   ```

1. Run the application using Artisan.

   ```bash
   $ php artisan serve
   ```

1. Check it out at [http://localhost:8000](http://localhost:8000)

## Run the tests

1. Run at the top-level directory.

   ```bash
   $ phpunit
   ```

## Meta

* No warranty expressed or implied. Software is as is. Diggity.
* [MIT License](http://www.opensource.org/licenses/mit-license.html)
* Lovingly crafted by Twilio Developer Education.
