<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Size;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = PRoduct::where('status', 1)->latest()->limit(12)->get();

        return view('frontend.welcome', compact('categories', 'subcategories', 'brands', 'units', 'sizes', 'colors', 'products'));
    }
}
