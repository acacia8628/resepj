<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendTodaysReserveUser;
use Illuminate\Support\Facades\Config;
use App\Models\Reserve;
use Carbon\Carbon;
use Mail;

class SendMailToReserveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendMailToReserveUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '予約当日のユーザーにリマインダーメールを送信';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $reserves = Reserve::with(['user', 'shop.user'])
            ->where('reserve_date', $current_date)
            ->get();

        foreach ($reserves as $reserve) {
            Config::set('mail.from', [
                'address' => $reserve->shop->user->email,
                'name' => $reserve->shop->name
            ]);

            Mail::to($reserve->user)
            ->send(new SendTodaysReserveUser());
        }
    }
}
