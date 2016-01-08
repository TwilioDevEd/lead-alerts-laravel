<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationsControllerTest extends TestCase
{
    public function testCreate()
    {
        $mockClient   = Mockery::mock('Services_Twilio')->makePartial();
        $mockAccount  = Mockery::mock();
        $mockMessages = Mockery::mock();
        $mockClient->account   = $mockAccount;
        $mockAccount->messages = $mockMessages;
        $twilioPhoneNumber = config('services.twilio')['twilioPhoneNumber'];
        $agentPhoneNumber  = config('services.twilio')['agentPhoneNumber'];
        $message = "New lead received for house-title. Call name at phone. Message: message";

        $mockMessages
            ->shouldReceive('sendMessage')
            ->with($twilioPhoneNumber, $agentPhoneNumber, $message)
            ->once();

        $this->app->instance(
            'Services_Twilio',
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

        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('home');
    }
}
