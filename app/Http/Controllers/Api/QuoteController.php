<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function quotes(QuoteRequest $request) {

       return response("true",200);
    }
}
