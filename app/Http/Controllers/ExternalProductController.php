<?php

namespace App\Http\Controllers;

use Exception;
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
        $response = Http::get('http://pixelplace.site/public/api/products');

        try {
            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                // Obtener los datos de los productos
                $products = $response->json();
            } else {
                // Manejar el error en caso de que la solicitud falle
                $products = [];
            }
        } catch (Exception $e) {
            $jsonFile = storage_path('products.json');
            $products = json_decode(file_get_contents($jsonFile), true);
        }

        $viewData['products'] = $products;

        // Pasar los datos a la vista
        return view('ExternalProduct.index')->with('viewData', $viewData);
    }
}
