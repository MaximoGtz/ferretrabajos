<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Omnipay\Common\Message\RedirectResponseInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Payment; // Asegúrate de que el modelo Payment esté importado
use App\Models\Contrato;
use App\Models\Cliente;
// use Illuminate
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        // Instancia de Omnipay con la configuración del gateway PayPal
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->initialize([
            'clientId' => env('PAYPAL_CLIENT_ID'),
            'clientSecret' => env('PAYPAL_CLIENT_SECRET'),
            'testMode' => env('PAYPAL_TEST_MODE', true), // Por defecto en modo test
        ]);
    }

    public function pay(Request $request)
    {

        $requestInfo = $request->validate([
            'cliente_id' => 'required | numeric',
            'descripcion' => 'required|min:20',
            'fecha_cita' => 'required|date',
            'costo' => 'required | numeric',
            'estado' => 'required | string'
        ]);
        try {
            Session::put('info_contrato', $request->all());
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY', 'MXN'),
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
                // dd($arr);

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();
                // dd($payment);

                // SENTENCIA CORRECTA DESDE CLIENTECONTROLLER
                // dd(Session::get('info_contrato'));
                $info_contrato = Session::get('info_contrato');
                $fecha_cita = $info_contrato['fecha_cita'];
                $cliente_id = $info_contrato['cliente_id'];
                $costo = $info_contrato['costo'];
                $estado = $info_contrato['estado'];
                $descripcion = $info_contrato['descripcion'];

                $contrato = Contrato::create([
                    'cliente_id' => $cliente_id,
                    'fecha_cita' => $fecha_cita,
                    'descripcion' => $descripcion,
                    'costo' => $costo,
                    'estado' => $estado
                ]);
                // Obtener el cliente
                $cliente = Cliente::findOrFail($cliente_id);
                $contrato = $cliente->contratos()->latest()->first();

                $carrito = $contrato->carrito();
                // CIERRA SENTENCIA CORRECTA DESDE CLIENTECONTROLLER
                Session::forget('info_contrato');
                return redirect('/inicio/cliente');
                // return "Payment is Successful. Your Transaction Id is: " . $arr['id'];
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

