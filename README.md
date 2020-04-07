<a href="https://www.twilio.com">
  <img src="https://static0.twilio.com/marketing/bundles/marketing/img/logos/wordmark-red.svg" alt="Twilio" width="250" />
</a>

# Instant lead alerts example implemented with PHP and Laravel

This demo application shows how to implement instant lead alerts using Java and
Servlets. Notify sales reps or agents right away when a new lead comes in for
a real estate listing or other high value channel.

[Read the full tutorial here](https://www.twilio.com/docs/tutorials/walkthrough/lead-alerts/php/laravel)!

![](https://github.com/TwilioDevEd/lead-alerts-laravel/workflows/Laravel/badge.svg)

> We are currently in the process of updating this sample template. If you are encountering any issues with the sample, please open an issue at [github.com/twilio-labs/code-exchange/issues](https://github.com/twilio-labs/code-exchange/issues) and we'll try to help you.

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

   You can find your `TWILIO_ACCOUNT_SID` and `TWILIO_AUTH_TOKEN` in your
   [Twilio Account Settings](https://www.twilio.com/user/account/settings).
   You will also need a `TWILIO_PHONE_NUMBER`, which you may find [here](https://www.twilio.com/user/account/phone-numbers/incoming).

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
   $ vendor/bin/phpunit
   ```

## Meta

* No warranty expressed or implied. Software is as is. Diggity.
* The CodeExchange repository can be found [here](https://github.com/twilio-labs/code-exchange/).
* [MIT License](http://www.opensource.org/licenses/mit-license.html)
* Lovingly crafted by Twilio Developer Education.
