<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ManagerLoginController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $shop = Shop::with(['user'])->where('user_id', $user_id)->first();
        return view('manager.index', ['shop' => $shop]);
    }

    public function create()
    {
        return view('manager.login');
    }

    public function store(LoginRequest $request)
    {
        $user_id = Auth::id();
        $request->authenticate();
        $request->session()->regenerate();

        $shop = Shop::with(['user'])->where('user_id', $user_id)->first();
        return redirect()->intended('manager')->with(['shop' => $shop]);
    }
}
