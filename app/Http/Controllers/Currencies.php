<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Currency;

class Currencies extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.tcmb.gov.tr/kurlar/today.xml?');
        $datas = $response->body();
        $xml = simplexml_load_string($datas) or die("Error: Cannot create object");
        $kurTarih = $xml["Tarih"];
        $dolar = $xml->Currency->BanknoteSelling;
        echo $dolar;
        $kurAdi = 'USD';
        $aciklama = $kurTarih . ' Günü Belirlenen Gösterge Niteliğindeki Türkiye Cumhuriyet Merkez Bankası USD Kuru Değeri: ' . $dolar;
        $saat = '12.00';

    }

    public function store(Request $request)
    {
        $response = Http::get('https://www.tcmb.gov.tr/kurlar/today.xml?');
        $datas = $response->body();
        $xml = simplexml_load_string($datas) or die("Error: Cannot create object");
        $kurTarih = $xml["Tarih"];
        $dolar = $xml->Currency->BanknoteSelling;
        $kurAdi = 'USD';
        $aciklama = $kurTarih . ' Günü Belirlenen Gösterge Niteliğindeki Türkiye Cumhuriyet Merkez Bankası USD Kuru Değeri: ' . $dolar;
        $saat = '12.00';

        $currency = new Currency();
        $currency->tarih = $kurTarih;
        $currency->deger = $dolar;
        $currency->name = $kurAdi;
        $currency->saat = $saat;
        $currency->aciklama = $aciklama;
        $currency->save();
    }
}
