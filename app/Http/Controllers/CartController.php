<?php 
 
namespace App\Http\Controllers; 
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
 
use App\Models\Product; 
use Illuminate\Http\Request; 
 
class CartController extends Controller 
{ 
    public function index(Request $request): View
    { 
        $total = 0; 
        $productsInCart = []; 
 
        $productsInSession = $request->session()->get("products"); 
        if ($productsInSession) { 
            $productsInCart = Product::findMany(array_keys($productsInSession)); 
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession); 
        } 
 
        $viewData = []; 
        $viewData["title"] = "Cart - Online Store"; 
        $viewData["subtitle"] =  "Shopping Cart"; 
        $viewData["total"] = $total; 
        $viewData["products"] = $productsInCart; 
        return view('cart.index')->with("viewData", $viewData); 
    } 
 
    public function add(Request $request, string $id): RedirectResponse 
    { 
        $products = $request->session()->get("products"); 
        $products[$id] = $request->input('quantity'); 
        $request->session()->put('products', $products); 
 
        return back(); 
    } 
 
    public function delete(Request $request) 
    { 
        $request->session()->forget('products'); 
        return back(); 
    } 
} 