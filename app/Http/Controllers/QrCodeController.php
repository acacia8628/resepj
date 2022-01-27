<?php

namespace App\Http\Controllers;

use App\Models\Reserve;

class QrCodeController extends Controller
{
    public function show($id)
    {
        $reserve = Reserve::find($id);
        return view('reserve.qr_code', ['reserve' => $reserve]);
    }
}
