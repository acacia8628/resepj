<?php

namespace App\Http\Controllers;

class ThanksController extends Controller
{
    public function index()
    {
        return view('thanks');
    }

    public function create()
    {
        return view('provisional_register');
    }
}
