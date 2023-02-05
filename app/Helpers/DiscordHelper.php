<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use App\Enums\Education;
use App\Models\User;
use App\Models\Contact;

class DiscordHelper
{

    protected static function contact_alert($contact) {
        return [
        "data" => [
            "content"=> "Hey, you have a new contact request from " . $contact->full_name . " (" . $contact->email . ")",
          "embeds"=> [
            [
              "color"=> 5814783,
              "fields"=> [
                [
                  "name"=> "Name",
                  "value"=> $contact->full_name,
                  "inline"=> true
                ],
                [
                  "name"=> "Email",
                  "value"=> $contact->email,
                  "inline"=> true
                ],
                [
                  "name"=> "Phone",
                  "value"=> $contact->phone,
                  "inline"=> true
                ],
                [
                  "name"=> "Subject",
                  "value"=> $contact->subject,
                ],
                [
                  "name"=> "Message",
                  "value"=> $contact->message,
                ]
              ]
             
              ]
          ],
          "username"=> "Edu Hunt",
          "avatar_url"=> "https://zephyr.icrewsystems.com/images/logo-white.png",
          "attachments"=> []
        ],
        "url" => config('webhooks.contact_webhook_url')
    ];
    }
    
    protected static function registration_alert($user)
    {
        return [
            "data" => [
            "content"=> "Hey, you have a new registration from " . $user->first_name . " " . $user->last_name . " (" . $user->phone . ")",
              "embeds"=> [
                [
                  "color"=> 5814783,
                  "fields"=> [
                    [
                      "name"=> "Name",
                      "value"=> $user->first_name . " " . $user->last_name,
                    ],
                    [
                      "name"=> "Email",
                      "value"=> $user->email,
                      "inline"=> true
                    ],
                    [
                      "name"=> "Phone",
                      "value"=> $user->phone,
                      "inline"=> true
                    ],
                    [
                      "name"=> "Education",
                      "value"=> $user->education,
                    ],
                    [
                      "name"=> $user->education == Education::SCHOOL ? "Class" : "Year of Passing",
                      "value"=> $user->education == Education::SCHOOL ? $user->class : $user->year_of_passing,
                      "inline"=> true
                    ],
                    /* [
                      "name"=> "Session",
                      "value"=> $user->session,
                      "inline"=> true
                    ],
                    [
                      "name"=> "Timing",
                      "value"=> $user->timing,
                      "inline"=> true
                    ],
                    [
                      "name"=> "City",
                      "value"=> $user->city,
                      "inline"=> true
                    ],
                    [
                      "name"=> "Locality",
                      "value"=> $user->locality,
                      "inline"=> true
                    ] */
                  ]
                 
                  ]
              ],
              "username"=> "Edu Hunt",
              "avatar_url"=> "https://zephyr.icrewsystems.com/images/logo-white.png",
              "attachments"=> []
            ],
            "url" => config('webhooks.registration_webhook_url')
        ];
    }

    public static function newContact($model)
    {
        $json = self::contact_alert($model);
        $url = $json['url'];
        $data = $json['data'];
        $response = Http::post($url, $data);
        return $response;
    }

    public static function newRegistration($model)
    {
        $json = self::registration_alert($model);
        $url = $json['url'];
        unset($json['url']);
        $response = Http::post($url, $json);
        return $response;
    }
}