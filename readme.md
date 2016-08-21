# AfricasTalking Laravel Package

## Introduction

AfricasTalking Laravel package provides an expressive, fluent interface to
Subscription, SMS and Voice to the Africa's Talking API. It handles all the boilerplate to get you up and running with SMS and Voice.

## License

The AfricasTalking Laravel package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Installation

Install the package via composer.

    $ composer require derrickjames/africas-talking

Add the service provider by modifying the `providers` array in `config/app.php`
to include `AfricasTalkingServiceProvider`.

    'providers' => [
        //...
        'DerrickJames\AfricasTalking\AfricasTalkingServiceProvider'
    ],

Add the facade to the `aliases` array in `config/app.php`.

    'aliases' => [
        //...
        'AfricasTalking' => 'DerrickJames\AfricasTalking\Facades\AfricasTalking'
    ],

    $ php artisan vendor:publish

In your .env file, setup your API Key and username.

    AFRICAS_TALKING_API_KEY=your-africas-talking-api-key-string
    AFRICAS_TALKING_USERNAME=your-africas-talking-username

## Usage

Using the helper.

    public function sendSMS()
    {
        $response = africasTalking()
            ->driver('sms')
            ->to('+254721234567')
            ->message('Test Africas Talking service package.')
            ->send();
    }

Using the factory.

    use DerrickJames\AfricasTalking\Contracts\Factory;

    class NotifierController extends Controller
    {
        protected $provider;

        public function __construct(Factory $provider) {
            $this->provider = $provider;
        }

        public function sendSMS() {
            $response = $this->provider
                 ->driver('sms')
                 ->to('+254724147772')
                 ->message('Test Africas Talking SMS package.')
                 ->send();
        }
    }

Using the facade.

    use AfricasTalking;

    public function sendSMS()
    {
        $response = AfricasTalking::driver('sms')
             ->to('+254724147772')
             ->message('Test Africas Talking SMS package.')
             ->send();
    }

