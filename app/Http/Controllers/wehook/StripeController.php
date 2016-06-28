<?php

namespace App\Http\Controllers\wehook;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Laravel\Cashier\WebhookController as BaseController;
class StripeController extends BaseController
{  
  public function handleOrderPaymentSucceeded(array $payload)
    {
        Log::info('Payment Succeeded - StripeWebhook - handleOrderPaymentSucceeded()', ['details' => json_encode($payload)]);
        return new Response('Webhook Handled', 200);
    }

    public function test(){
        $tester = new \TeamTNT\Stripe\WebhookTester('http://stripe.local/wehook/stripe');
        $response = $tester->setVersion('2014-09-08')->triggerEvent('charge.succeeded');
       
    }
}
