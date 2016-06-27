<?php

namespace App\Http\Controllers\wehook;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Laravel\Cashier\WebhookController as BaseController;
class StripeController extends BaseController
{  
 public function handleOrderPaymentSucceeded()
    {
   $body = @file_get_contents('php://input');
$event_json = json_decode($body);

// for extra security, retrieve from the Stripe API
$event_id = $event_json->id;
$event = \Stripe_Event::retrieve($event_id);

    }

    public function test(){
        $tester = new \TeamTNT\Stripe\WebhookTester('http://stripe.local/wehook/stripe');
        $response = $tester->setVersion('2014-09-08')->triggerEvent('charge.succeeded');
       
    }
}
