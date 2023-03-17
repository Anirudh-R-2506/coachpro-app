<?php


namespace App\Helpers;


use Twilio;


class SmsHelper
{
    public static function parse_number($number): string
    {
        if (substr($number, 0, 1) == '+') {
            $number = str_replace(' ', '', $number);
            $number = str_replace('-', '', $number);
            return $number;
        } else {
            $number = str_replace(' ', '', $number);
            $number = str_replace('-', '', $number);
            return '+91' . $number;
        }
    }

    public static function send($to = '', $message = ''): Twilio\Rest\Api\V2010\Account\MessageInstance
    {
        $to = self::parse_number($to) ?? throw new \Exception('SmsHelper: Number not provided');
        $message = $message ?? throw new \Exception('SmsHelper: Message not provided');
        return Twilio::message($to, $message);
    }
}