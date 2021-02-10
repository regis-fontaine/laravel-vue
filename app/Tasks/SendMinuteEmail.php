<?php

namespace App\Tasks;

use App\User;
use SendGrid;
use Exception;
use Carbon\Carbon;
use SendGrid\Mail\To;
use App\Models\Contact;
use SendGrid\Mail\From;
use SendGrid\Mail\Mail;
use Illuminate\Support\Facades\Log;

class SendMinuteEmail
{
    public function __invoke()
    {
        // retrieve Contacts activate with 1 minute interval
        $contactsFromOneMin = Contact::all()->where('isActivate', 1)->where('interval', '1m');
        // dd($contactsFromOneMin);
        foreach ($contactsFromOneMin as $contact) {
            // Log::error($contact);
            Log::error('**********START_HERE**********');
            $this->sendEmail($contact);
        }
    }

    private function sendEmail($contact)
    {

        Log::info("Email Initialisation for :" . $contact['id']);

        try {
            Log::info("Access Try method for :" . $contact['id']);

            $date = Carbon::now('Europe/Paris')->format('d-m-Y H:i:s');
            $email = new Mail();
            $email->setFrom("sebastienhb@gmail.com", "EmailSender Admin");
            $email->setSubject("Hello " . $contact['receiver']);
            $email->addTo($contact['email'], $contact['receiver']);
            $email->addContent("text/plain", "Hello $date");
            $email->addContent(
                "text/html",
                "<strong>Hello $date </strong>"
            );
            $sendgrid = new SendGrid(getenv('SENDGRID_API_KEY'));
            $response = $sendgrid->send($email);
            Log::info($response->statusCode() . "\n");
            Log::info($response->headers());
            Log::info($response->body() . "\n");
            Log::info("Succeed Try method for :" . $contact['id']);
        } catch (Exception $e) {
            Log::error('Caught exception: ' . $e->getMessage() . "\n On contact : " . $contact['id']);
        }
        Log::info('**********END_HERE**********');
    }
}
