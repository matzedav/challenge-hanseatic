<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;

use App\Models\Quote;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;


class QuoteController extends Controller
{
    public function quotes(QuoteRequest $request) {
        // get quotes from db
        $quotes_db = Quote::all(['quote', 'character', 'image', 'characterDirection'])->toArray();

        // calculate how many quotes should requested and get quotes from API
        $number_of_quotes = 5-count($quotes_db);
        $quotes_api = Http::get("https://thesimpsonsquoteapi.glitch.me/quotes?count={$number_of_quotes}")->json();
        
        if (count($quotes_db) >= 4) {
            // delete oldest quote and save first quote
            Quote::orderBy('created_at')->first()->delete();
            Quote::create(['quote' => $quotes_api[0]['quote'], 'character' => $quotes_api[0]['character'], 'image' => $quotes_api[0]['image'], 'characterDirection' => $quotes_api[0]['characterDirection']]);
        } else {
            // make sure we got at least 4 quotes
            for ($i = 0; $i < count($quotes_api) && $i <= 3-count($quotes_db); $i++) {
                Quote::create(['quote' => $quotes_api[$i]['quote'], 'character' => $quotes_api[$i]['character'], 'image' => $quotes_api[$i]['image'], 'characterDirection' => $quotes_api[$i]['characterDirection']]);
            }
        }

        // merge api and db response
        return response()->json(['quotes' => array_merge($quotes_db, $quotes_api)], Response::HTTP_OK);
    }
}
