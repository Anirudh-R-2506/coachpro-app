<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use ReCaptcha;

class ReCaptchaRule implements Rule
{

    private $error_msg = '';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if (env('APP_ENV') == 'local') {
            return true;
        }

        if (empty($value)) {
            $this->error_msg = 'Recaptcha field could not be loaded. Please try again.';
            
            return false;
        }

        $client = new Client();

        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHAV3_SECRET'),
                'response' => $value,
            ]
        ]);

        $response = json_decode((string) $response->getBody(), true);

        if (!$response['success']) {
            $this->error_msg = 'Recaptcha failed. Please try again.';
            return false;
        }
        
        if ($response['score'] < 0.5) {
            $this->error_msg = 'Recaptcha failed. Please try again.';
            return false;
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error_msg;
    }
}
