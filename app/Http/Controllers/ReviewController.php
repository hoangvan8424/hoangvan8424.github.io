<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function save(Request $request)
    {
        dd($request->all());
    }
}
