<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoinController extends Controller
{
    public function index()
    {
        return view('clients.add_coin.index');
    }
}
