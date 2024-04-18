<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = $request->get('search');
        $category = $request->get('category');
        $sort = $request->get('sort', 'asc');

        $viewData = [];
        $viewData['categories'] = Product::select('category')->distinct()->get();
        $viewData['title'] = __('products.title.index');
        $viewData['subtitle'] = __('products.subtitle.index');
        $viewData['products'] = Product::search($searchTerm)->category($category)->sortByPrice($sort)->get();

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
}
