<?php

namespace App\Http\Controllers\Emails;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Mail\SendIndividualToCustomer;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;
use Carbon\Carbon;
use Mail;

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
            ->send(new SendIndividualToCustomer());
        return redirect('manager');
    }

    public function allSend(Request $request)
    {
        $manager = Auth::user();
        $current_date = Carbon::now()->format('Y-m-d');
        $shop = Shop::where('id', $request->shop_id)->first();

        $reserves = Reserve::with(['user'])
            ->where('shop_id', $shop->id)
            ->whereDate('reserve_date', '>', $current_date)
            ->get();

        Config::set('mail.from', [
            'address' => $manager->email,
            'name' => $shop->name
        ]);

        foreach($reserves as $reserve){
            Mail::to($reserve->user)
            ->send(new SendIndividualToCustomer());
        }
        return redirect('manager');
    }
}
