<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Buyer;
use App\Models\Category;
use App\Models\Input;
use App\Models\Invoice;
use App\Models\Measure;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users= User::all()->count();
        $providers= Provider::all()->count();
        $measures= Measure::all()->count();
        $categories= Category::all()->count();
        $products= Product::all()->count();
        $brands= Brand::all()->count();
        
        return view("admin.homepage.index",compact('brands','users','providers','measures','categories','products'));
    }
}
