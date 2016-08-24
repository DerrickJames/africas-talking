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
```php
'providers' => [
    //...
    'DerrickJames\AfricasTalking\AfricasTalkingServiceProvider'
],
```

Add the facade to the `aliases` array in `config/app.php`.
```php
'aliases' => [
    //...
    'AfricasTalking' => 'DerrickJames\AfricasTalking\Facades\AfricasTalking'
],
```
```bash
$ php artisan vendor:publish
```

In your .env file, setup your API Key and username.

    AFRICAS_TALKING_API_KEY=your-africas-talking-api-key-string
    AFRICAS_TALKING_USERNAME=your-africas-talking-username

## Usage

The package uses three different drivers which expose fluent interfaces for subscription, sms and voice.

  * Subscription - Create a subscription to Africa's Talking service.
  * SMS - Send SMS messages and fetch messages.
  * Voice - Make voice calls

Be sure to specify the driver when interacting with the package.

Using the helper.
```php
public function sendSMS()
{
    $response = africasTalking()
        ->driver('sms')
        ->to(['+254721234567'])
        ->message('Test Africas Talking API service SMS driver.')
        ->send();

    dd(json_decode($response)); // instance of GuzzleHttp/Psr7/Response
}
```

Using the factory.

```php
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
             ->to(['+254724147352'])
             ->message('Test Africas Talking API SMS driver.')
             ->send();

        dd(json_decode($response)); // instance of GuzzleHttp/Psr7/Response
    }
}
```

Using the facade.

```php
use AfricasTalking;

public function sendSMS()
{
    $response = AfricasTalking::driver('sms')
         ->to(['+254724147802'])
         ->message('Test Africas Talking API SMS driver.')
         ->send();

    dd(json_decode($response)); // instance of GuzzleHttp/Psr7/Response
}
```
