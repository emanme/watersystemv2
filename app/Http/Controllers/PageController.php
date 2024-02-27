<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('dashboard', ['title' => "Dashboard"]);
    }

    public function about()
    {
        return view('pages.about');
    }
   
}
