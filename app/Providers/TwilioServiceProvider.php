<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Services_Twilio;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Initializes and registers Twilio SDK's object.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Services_Twilio', function ($app) {
            $accountSid = config('services.twilio')['accountSid'];
            $authToken  = config('services.twilio')['authToken'];
            return new Services_Twilio($accountSid, $authToken);
        });
    }
}
