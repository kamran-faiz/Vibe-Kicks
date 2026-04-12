<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
      // Fetch products from the database
      $products = Product::all();
      
      // Return products as JSON response
      return Inertia::render('Products', ['products' => $products]);
  }
}
