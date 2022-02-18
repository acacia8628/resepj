<?php

namespace App\Http\Controllers\Emails;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Mail\SendIndividualToCustomer;
use App\Mail\SendAllToCustomer;
use App\Models\Reserve;
use App\Models\Shop;
use Carbon\Carbon;
use Mail;

class MailSendController extends Controller
{
    public function individualSend(Request $request)
    {
        $manager = Auth::user();
        $shop = Shop::where('id', $request->shop_id)->first();
        $reserve = Reserve::with(['user'])
            ->where('id', $request->reserve_id)
            ->where('status', 'reserved')
            ->first();

        if (isset($reserve) && $shop->user_id == $manager->id) {
            Config::set('mail.from', [
                'address' => $manager->email,
                'name' => $shop->name
            ]);

            Mail::to($reserve->user)
                ->send(new SendIndividualToCustomer());
            return redirect('manager');
        } else {
            return redirect('manager');
        }
    }

    public function allSend(Request $request)
    {
        $manager = Auth::user();
        $current_date = Carbon::now()->format('Y-m-d');
        $shop = Shop::where('id', $request->shop_id)->first();

        $reserves = Reserve::with(['user'])
            ->where('shop_id', $shop->id)
            ->where('status', 'reserved')
            ->get();

        if (isset($reserves[0])) {
            Config::set('mail.from', [
                'address' => $manager->email,
                'name' => $shop->name
            ]);

            foreach ($reserves as $reserve) {
                Mail::to($reserve->user)
                    ->send(new SendAllToCustomer());
            }
            return redirect('manager');
        } else {
            return redirect('manager');
        }
    }
}
