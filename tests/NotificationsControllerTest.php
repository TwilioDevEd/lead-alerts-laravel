<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Twilio\Rest\Client;

class NotificationsControllerTest extends TestCase
{
    public function testCreate()
    {
        $mockClient   = Mockery::mock(Client::class)->makePartial();
        $mockMessages = Mockery::mock();
        $mockClient->messages = $mockMessages;
        $twilioPhoneNumber = config('services.twilio')['twilioPhoneNumber'];
        $agentPhoneNumber  = config('services.twilio')['agentPhoneNumber'];
        $message = "New lead received for house-title. Call name at phone. Message: message";

        $mockMessages
            ->shouldReceive('create')
            ->with(
                $agentPhoneNumber,
                array(
                    'from' => $twilioPhoneNumber,
                    'body' => $message
                )
            )
            ->once();

        $this->app->instance(
            Client::class,
            $mockClient
        );

        $response = $this->call(
            'POST',
            route('notifications.create'),
            [
                'houseTitle' => 'house-title',
                'name'       => 'name',
                'phone'      => 'phone',
                'message'    => 'message',
                '_token'     => csrf_token()]
        );

        $this->assertEquals($response->getStatusCode(), 302);
        $response->assertRedirect(route('home'));

    }
}
