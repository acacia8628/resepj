<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('review');
    }

    public function destroy($id)
    {
        //
    }
}
