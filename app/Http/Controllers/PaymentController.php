<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\Common\Message\RedirectResponseInterface;
use Illuminate\Support\Facades\Log;
use App\Models\Payment; // Asegúrate de que el modelo Payment esté importado

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        // Instancia de Omnipay con la configuración del gateway PayPal
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize([
            'clientId'     => env('PAYPAL_CLIENT_ID'),
            'clientSecret' => env('PAYPAL_CLIENT_SECRET'),
            'testMode'     => env('PAYPAL_TEST_MODE', true), // Por defecto en modo test
        ]);
    }

    public function pay(Request $request) {
        try {
            $response = $this->gateway->purchase([
                'amount'   => $request->amount,
                'currency' => env('PAYPAL_CURRENCY', 'USD'),  // Valor predeterminado para la moneda
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ])->send();
    
            // Verifica si la respuesta es de tipo RedirectResponseInterface antes de llamar a redirect()
            if ($response instanceof RedirectResponseInterface && $response->isRedirect()) {
                return $response->redirect();
            } else {
                return $response->getMessage();
            }
    
        } catch (\Throwable $th) {
            Log::error('Error en el pago: ' . $th->getMessage());
            return back()->withError('Error al procesar el pago.');
        }
    }

    public function success(Request $request) 
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return "Payment is Successful. Your Transaction Id is: " . $arr['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return "Payment declined";
        }
    }

    function error()
     {
        return 'User declined the payment';
    }
}

