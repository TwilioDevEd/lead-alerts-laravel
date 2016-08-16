<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Twilio\Rest\Client;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Initializes and registers Twilio SDK's object.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class, function ($app) {
            $accountSid = config('services.twilio')['accountSid'];
            $authToken  = config('services.twilio')['authToken'];
            return new Client($accountSid, $authToken);
        });
    }
}
