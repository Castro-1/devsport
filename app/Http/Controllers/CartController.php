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
        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data', []);

        $totalCost = 0;

        foreach ($cartProductData as $productId => $quantity) {
            try {
                $product = Product::findOrFail($productId);
            } catch (Exception $e) {
                continue;
            }
            $cartProducts[$productId] = [
                'quantity' => $quantity,
                'product' => $product,
            ];
            $totalCost += $product['price'] * $quantity;
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
        $cartProductData = $request->session()->get('cart_product_data');
        $quantity = $request->get('quantity', 1);
        if (! isset($cartProductData[$id])) {
            $cartProductData[$id] = $quantity;
        } else {
            $cartProductData[$id] += $quantity;
        }

        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    public function remove(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        if ($cartProductData[$id] > 1) {
            $cartProductData[$id] -= 1;
        } else {
            unset($cartProductData[$id]);
        }

        $request->session()->put('cart_product_data', $cartProductData);

        return back();
    }

    public function removeAll(Request $request): RedirectResponse
    {

        $request->session()->forget('cart_product_data');

        return back();
    }
}
