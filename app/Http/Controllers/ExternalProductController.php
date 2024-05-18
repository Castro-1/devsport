<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ExternalProductController extends Controller
{
    public function index(): view
    {
        $viewData = [];
        $viewData['title'] = 'Productos';
        $viewData['subtitle'] = 'Productos';

        // Hacer la solicitud a la API
        // $response = Http::get('http://35.192.79.47/public/api/products');

        // // Verificar si la solicitud fue exitosa
        // if ($response->successful()) {
        //     // Obtener los datos de los productos
        //     $products = $response->json();
        // } else {
        //     // Manejar el error en caso de que la solicitud falle
        //     $products = [];
        // }

        $jsonFile = storage_path('products.json');
        $products = json_decode(file_get_contents($jsonFile), true);

        $viewData['products'] = $products;

        // Pasar los datos a la vista
        return view('ExternalProduct.index')->with('viewData', $viewData);
    }
}
