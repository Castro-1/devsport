<?php

// Author: Sara María Castrillón Ríos

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminHomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page';

        return view('admin.home.index')->with('viewData', $viewData);
    }
}
