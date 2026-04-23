<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->groupBy('category');
        return view('shop.index', compact('products'));
    }

    public function category($category)
    {
        $valid = ['daily-care', 'fresh-breath', 'dental-tools'];
        abort_if(!in_array($category, $valid), 404);

        $products = Product::where('category', $category)->get();
        $categoryName = match($category) {
            'daily-care' => 'Daily Care',
            'fresh-breath' => 'Fresh Breath',
            'dental-tools' => 'Dental Tools',
        };

        return view('shop.category', compact('products', 'category', 'categoryName'));
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }
}