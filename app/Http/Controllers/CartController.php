<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function purchase(Request $request): View|RedirectResponse
    {
        $productsInSession = $request->session()->get('cartProducts');
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }
            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);
            Auth::user()->save();

            $request->session()->forget('cartProducts');

            $viewData = [];
            $viewData['title'] = 'Purchase - Online Store';
            $viewData['subtitle'] = 'Purchase Status';
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('login');
        }
    }
}
