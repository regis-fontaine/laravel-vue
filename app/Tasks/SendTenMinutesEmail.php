<?php

namespace App\Tasks;

use SendGrid;
use Exception;
use Carbon\Carbon;
use App\Models\Contact;
use SendGrid\Mail\Mail;
use Illuminate\Support\Facades\Log;

class SendTenMinutesEmail
{
    public function __invoke()
    {
        // retrieve Contacts activate with 10 minute interval
        $contactsFromOneMin = Contact::all()->where('isActivate', 1)->where('interval', '10m');
        // dd($contactsFromOneMin);
        foreach ($contactsFromOneMin as $contact) {
            // Log::error($contact);
            Log::error('**********START_HERE_10M**********');
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
            $email->addContent("text/plain", "Hello World $date");
            $email->addContent(
                "text/html",
                "<strong>Hello World $date </strong>"
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
