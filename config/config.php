<?php

return [

    /*
     |-------------------------------------------------------------------------
     | API Key
     |-------------------------------------------------------------------------
     |
     | Specify your login API key.
     |
     */

    'api_key' => env('AFRICAS_TALKING_API_KEY', 'your-api-key'),

    /*
     |-------------------------------------------------------------------------
     | Username
     |-------------------------------------------------------------------------
     |
     | Specify your login username.
     |
     */

    'username' => env('AFRICAS_TALKING_USERNAME', 'your-username'),

    /*
    |--------------------------------------------------------------------------
    | Global "From" Phone Number
    |--------------------------------------------------------------------------
    |
    | You may wish for all SMS messages and voice calls sent by your
    | application to be sent from the same address. Here, you may
    | specify the phone number that is used globally for all
    | SMS nessages and voice calls that are sent by your
    | application.
    |
    */

    'from' => '',

    /*
     |-------------------------------------------------------------------------
     | Voice URL
     |-------------------------------------------------------------------------
     |
     | Voice endpoint.
     |
     */

    'voice_url' => 'https://voice.africastalking.com',

    /*
     |-------------------------------------------------------------------------
     | User URL
     |-------------------------------------------------------------------------
     |
     | User endpoint.
     |
     */

    'user_url' => 'https://api.africastalking.com/version1/user',

    /*
     |-------------------------------------------------------------------------
     | SMS URL
     |-------------------------------------------------------------------------
     |
     | SMS endpoint.
     |
     */

    'sms_url' => 'https://api.africastalking.com/version1/messaging',

    /*
     |-------------------------------------------------------------------------
     | Airtime URL
     |-------------------------------------------------------------------------
     |
     | Airtime endpoint.
     |
     */

    'airtime_url' => 'https://api.africastalking.com/version1/airtime',

    /*
     |-------------------------------------------------------------------------
     | Subscription URL
     |-------------------------------------------------------------------------
     |
     | Subscription endpoint.
     |
     */

    'subscription_url' => 'https://api.africastalking.com/version1/subscription',

    /*
     |-------------------------------------------------------------------------
     | Options
     |-------------------------------------------------------------------------
     |
     | Specify the various options to be used throughout the package.
     |
     */

    'options' => [

        /*
         |---------------------------------------------------------------------
         | SMS Options
         |---------------------------------------------------------------------
         |
         | Specify the various SMS options.
         |
         */

        'sms' => [

            /*
             |-----------------------------------------------------------------
             | Bulk SMS Mode
             |-----------------------------------------------------------------
             |
             | Default is 1 for bulk messages.
             |
             */

            'bulkSMSMode' => 1,

            /*
             |-----------------------------------------------------------------
             | Enqueue
             |-----------------------------------------------------------------
             |
             | Queues a message to be sent later instead of instantly. Default
             | is 0. Supported: 0, 1
             |
             */

            'enqueue' => 0,

            /*
             |-----------------------------------------------------------------
             | Keyword
             |-----------------------------------------------------------------
             |
             | Specify your premium keyword.
             |
             */

            'keyword' => '',

            /*
             |-----------------------------------------------------------------
             | Short Code
             |-----------------------------------------------------------------
             |
             | Specify your premium short code.
             |
             */

            'shortCode' => '',

            /*
             |-----------------------------------------------------------------
             | Link ID
             |-----------------------------------------------------------------
             |
             | Link ID is received from the message sent by subscriber to your
             | onDemand service.
             |
             */

            'linkId' => '',

            /*
             |-----------------------------------------------------------------
             | Retry Duration In Hours
             |-----------------------------------------------------------------
             |
             | Number of hours until the next retry. Value must be an integer.
             |
             */

            'retryDurationInHours' => '',

        ],

        /*
         |---------------------------------------------------------------------
         | Voice Options
         |---------------------------------------------------------------------
         |
         | Specify the various Voice options.
         |
         */

        'subscription' => [

            /*
             |-----------------------------------------------------------------
             | Keyword
             |-----------------------------------------------------------------
             |
             | Specify your premium keyword.
             |
             */

            'keyword' => env('AFRICAS_TALKING_KEYWORD', ''),

            /*
             |-----------------------------------------------------------------
             | Short Code
             |-----------------------------------------------------------------
             |
             | Specify your premium short code.
             |
             */

            'shortCode' => env('AFRICAS_TALKING_SHORT_CODE', ''),

        ]

    ]

];
