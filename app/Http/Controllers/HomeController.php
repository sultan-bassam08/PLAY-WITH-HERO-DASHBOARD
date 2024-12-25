<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home.index'); // Ensure the `home.blade.php` view exists in `resources/views/`
    }
}