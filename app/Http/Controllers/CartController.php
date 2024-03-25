<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $totalCost = 0;
        $cartProducts = [];
        $cartProductData = $request->session()->get('cartProducts'); 
        if ($cartProductData) { 
            $cartProducts = Product::findMany(array_keys($cartProductData)); 
            $totalCost = Product::sumPricesByQuantities($cartProducts, $cartProductData); 
        } 
        

        $viewData = [];
        $viewData['title'] = __('cart.title.index');
        $viewData['subtitle'] = __('cart.subtitle.index');
        $viewData['cartProducts'] = $cartProducts;
        $viewData['totalCost'] = $totalCost;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProducts = $request->session()->get('cartProducts');
        $quantity = $request->get('quantity', 1);
        if (! isset($cartProducts[$id])) {
            $cartProducts[$id] = $quantity;
        } else {
            $cartProducts[$id] += $quantity;
        }

        $request->session()->put('cartProducts', $cartProducts);

        return back();
    }

    public function remove(string $id, Request $request): RedirectResponse
    {
        $cartProducts = $request->session()->get('cartProducts');
        if ($cartProducts[$id] > 1) {
            $cartProducts[$id] -= 1;
        } else {
            unset($cartProducts[$id]);
        }

        $request->session()->put('cartProducts', $cartProducts);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {

        $request->session()->forget('cartProducts');

        return back();
    }
}
