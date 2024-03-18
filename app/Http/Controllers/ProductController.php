<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = $this->getViewData(__('products.title.index'), __('products.subtitle.index'));
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

    public function search(Request $request): View|RedirectResponse
    {
        $searchTerm = $request->get('search');

        if (! $searchTerm) {
            return redirect()->route('product.index');
        }

        $products = Product::where('name', 'like', '%'.$searchTerm.'%')
            ->orWhere('description', 'like', '%'.$searchTerm.'%')
            ->get();

        $viewData = $this->getViewData(__('products.title.search_results'), __('products.subtitle.search_results'));
        $viewData['products'] = $products;
        $viewData['searchPerformed'] = true;

        return view('product.index')->with('viewData', $viewData);
    }

    private function getViewData(string $title, string $subtitle): array
    {
        return [
            'title' => $title,
            'subtitle' => $subtitle,
        ];
    }
}
