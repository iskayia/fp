<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MidtransController extends Controller
{
    //
    public function createTransactionMidtrans($data) : string
    {
        $url = 'https://api.sandbox.midtrans.com/v1/payment-links';
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $base64Auth = base64_encode($serverKey . ":");

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Accept" => "application/json",
            "Authorization" => "Basic " . $base64Auth
        ])->post($url, $data);
        // var_dump($data);
        // Handle the response
        if ($response->successful()) {
            $transaction = $response->json();
            // var_dump($transaction);die();
            // Process the transaction data
            // ...

            return $transaction['payment_url'] ?? "";
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
            // var_dump($errorCode);
            // var_dump($errorMessage);die();
            // Handle the error
            // ...
            return "";
        }
    }

    public function getPaymentLinkUrl($order_id) : string
    {
        $url = "https://api.sandbox.midtrans.com/v1/payment-links/{$order_id}";
        $serverKey = env('MIDTRANS_SERVER_KEY');

        // var_dump($serverKey);
        $base64Auth = base64_encode($serverKey . ":");
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic '.$base64Auth,
        ];

        $response = Http::withHeaders($headers)->get($url);
        $responseData = $response->json();
        // var_dump($responseData);die();
        return $responseData['payment_link_url'] ?? "";
    }
}
