<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
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
        $viewData['title'] = $product->getName().__('products.title.show');
        $viewData['subtitle'] = $product->getName().__('products.subtitle.show');
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('products.title.create');

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->only(['name', 'description', 'category', 'image', 'price', 'stock']));

        return back();
    }
}
