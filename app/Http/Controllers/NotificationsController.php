<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Services_Twilio;

class NotificationsController extends Controller
{
    protected $client;

    public function __construct(Services_Twilio $client)
    {
        $this->client = $client;
    }

    public function create(Request $request)
    {
        $houseTitle = $request->input('houseTitle');
        $name       = $request->input('name');
        $phone      = $request->input('phone');
        $message    = $request->input('message');

        $formattedMessage = $this->formatMessage($houseTitle, $name, $phone, $message);

        try {
            $this->sendMessage($formattedMessage);
            $request
                ->session()
                ->flash('success', 'Thanks! An agent will be contacting you shortly.');
        } catch (Services_Twilio_RestException $e) {
            echo $e->getMessage();
            $request
                ->session()
                ->flash('error', 'Oops! There was an error. Please try again.');
        }

        return redirect()->route('home');
    }

    private function sendMessage($message)
    {
        $twilioPhoneNumber = config('services.twilio')['twilioPhoneNumber'];
        $agentPhoneNumber = config('services.twilio')['agentPhoneNumber'];
        $this->client->account->messages->sendMessage(
            $twilioPhoneNumber,
            $agentPhoneNumber,
            $message
        );
    }

    private function formatMessage($houseTitle, $name, $phone, $message)
    {
        return
            "New lead received for $houseTitle. " .
            "Call $name at $phone. " .
            "Message: $message";
    }
}
