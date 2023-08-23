<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    //
    public function index(Request $request)
    {
        $baseCurrency = $request->input('base_currency');
        $targetCurrency = $request->input('target_currency');

        $url = 'https://www.bcv.org.ve/tasas-de-cambio/dolar-paralelo/';

        $response = Http::get($url);

        if ($response->status() == 200) {
            $data = $response->body();

            $exchangeRate = json_decode($data)->dolar_paralelo;

            return view('exchange_rate', compact('exchangeRate'));
        } else {
            return abort(404);
        }
    }
}
