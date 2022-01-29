<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class QrCodeController extends Controller
{
    public function show($id)
    {
        $reserve = Reserve::where('id', $id)
            ->where('status', 'reserved')
            ->first();

        if (isset($reserve) && $reserve->user_id == Auth::id()) {
            return view('reserve.qr_code', ['reserve' => $reserve]);
        } else {
            return redirect('mypage');
        }
    }
}
