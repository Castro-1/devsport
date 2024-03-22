<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        $lastProduct = $products->last();

        $viewData = [];

        $viewData['products'] = $products;
        $viewData['lastProduct'] = $lastProduct;
        $viewData['title'] = __('Home Page');
        $viewData['subtitle'] = 'DevSport';

        return view('home.index')->with('viewData', $viewData);
    }
}
