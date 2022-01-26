<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Shop;
use App\Http\Requests\Admin\ManagerRegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function create()
    {
        $shops = Shop::all();
        return view('admin.manager_register', ['shops' => $shops]);
    }

    public function store(ManagerRegisterRequest $request)
    {
        $shop_id = $request->input('shop');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '3',
        ]);

        event(new Registered($user));

        Shop::where('id', $shop_id)
            ->update([
                'user_id' => $user->id
            ]);

        return redirect('admin');
    }
}
