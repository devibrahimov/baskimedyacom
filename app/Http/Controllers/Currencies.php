<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Currencies extends Controller
{
    public function index()
    {
        $response = Http::get('https://www.tcmb.gov.tr/kurlar/today.xml?');
        $datas = $response->body();
        $xml = simplexml_load_string($datas) or die("Error: Cannot create object");
        dd($xml->Currency);

//      dd($datas);


        return index;
    }
}
