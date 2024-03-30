<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = $request->get('search');
        $category = $request->get('category');

        $viewData = [];

        $products = Product::query();

        if ($searchTerm) {
            $products->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$searchTerm.'%');
            });
            $viewData['searchPerformed'] = true;
        }

        if ($category) {
            $products->where('category', $category);
        }


        $viewData['title'] = 'Admin Page - Products - Online Store';
        $viewData['categories'] = Product::select('category')->distinct()->get();
        $viewData['products'] = $products->get();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setCategory($request->input('category'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setStock($request->input('stock'));
        $newProduct->setImage('game.png');
        $newProduct->save();

        return back();
    }

    public function delete($id): RedirectResponse
    {
        Product::destroy($id);

        return back();
    }

    public function edit($id): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Edit Product - Online Store';
        $viewData['product'] = Product::findOrFail($id);

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));

        $product->save();

        return redirect()->route('admin.product.index');
    }
}
