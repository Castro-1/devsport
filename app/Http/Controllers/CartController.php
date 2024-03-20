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
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['cartProducts'] = $cartProducts;
        $viewData['totalCost'] = $totalCost;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        if (! isset($cartProductData[$id])) {
            $cartProductData[$id] = 1;
        } else {
            $cartProductData[$id] += 1;
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
// <?php 
 
// namespace App\Http\Controllers; 
// use Illuminate\Http\RedirectResponse;
// use Illuminate\View\View;
 
// use App\Models\Product; 
// use Illuminate\Http\Request; 
 
// class CartController extends Controller 
// { 
//     public function index(Request $request): View
//     { 
//         $total = 0; 
//         $productsInCart = []; 
 
//         $productsInSession = $request->session()->get("products"); 
//         if ($productsInSession) { 
//             $productsInCart = Product::findMany(array_keys($productsInSession)); 
//             $total = Product::sumPricesByQuantities($productsInCart, $productsInSession); 
//         } 
 
//         $viewData = []; 
//         $viewData["title"] = "Cart - Online Store"; 
//         $viewData["subtitle"] =  "Shopping Cart"; 
//         $viewData["total"] = $total; 
//         $viewData["products"] = $productsInCart; 
//         return view('cart.index')->with("viewData", $viewData); 
//     } 
 
//     public function add(Request $request, string $id): RedirectResponse 
//     { 
//         $products = $request->session()->get("products"); 
//         $products[$id] = $request->input('quantity'); 
//         $request->session()->put('products', $products); 
 
//         return back(); 
//     } 
 
//     public function delete(Request $request) 
//     { 
//         $request->session()->forget('products'); 
//         return back(); 
//     } 
// } 
