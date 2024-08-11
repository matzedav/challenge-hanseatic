<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    public function quotes(QuoteRequest $request) {

        $quotes_db = DB::table('quotes')->get();

        $number_of_quotes = 5-count($quotes_db);

        $quotes_api = Http::get("https://thesimpsonsquoteapi.glitch.me/quotes?count={$number_of_quotes}")->json();



        

        return response()->json($quotes_api);
    }
}
