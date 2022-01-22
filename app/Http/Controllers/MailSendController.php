<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Mail\SendMailToCustomer;
use Mail;
use App\Models\User;

class MailSendController extends Controller
{
    public function individualSend(Request $request)
    {
        $manager = Auth::user();
        $shop_name = $request->input('shop_name');
        $receive_user_id = $request->input('user_id');

        $receive_user = User::where('id', $receive_user_id)->first();
        Config::set('mail.from', [
            'address' => $manager->email,
            'name' => $shop_name
        ]);

        Mail::to($receive_user)
            ->send(new SendMailToCustomer());
        return redirect('manager');
    }
}
