<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyAccountController extends Controller
{
    public function orders(): View
    {
        $viewData = [];
        $viewData['title'] = __('My Orders - Online Store');
        $viewData['subtitle'] = __('My Orders');
        $viewData['orders'] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }
}
