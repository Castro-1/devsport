<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products Page';
        $viewData['subtitle'] = 'List of Products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $product = Product::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('product.index');
        }
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName().' - DevSport';
        $viewData['subtitle'] = $product->getName().' - Product information ';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }
}
