<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = [];
        $data['products'] = Product::paginate(8);
        return view('home', $data);
    }
}
