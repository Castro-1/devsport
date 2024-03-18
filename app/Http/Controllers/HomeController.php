<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Home Page');
        $viewData['subtitle'] = 'DevSport';

        return view('home.index')->with('viewData', $viewData);
    }
}
