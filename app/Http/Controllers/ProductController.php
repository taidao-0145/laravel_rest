<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        return view('product');
    }

    public function store(): Factory|View|Application
    {
        return view('store');
    }
}
