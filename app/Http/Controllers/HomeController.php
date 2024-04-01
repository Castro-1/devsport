<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        $items = new Item();
        $lastProduct = $products->last();
        $bestSellers = $items->getBestSellers();

        $viewData = [];

        $viewData['products'] = $products;
        $viewData['lastProduct'] = $lastProduct;
        $viewData['bestSellers'] = $bestSellers;
        $viewData['title'] = __('Home Page');
        $viewData['subtitle'] = 'DevSport';

        return view('home.index')->with('viewData', $viewData);
    }
}
