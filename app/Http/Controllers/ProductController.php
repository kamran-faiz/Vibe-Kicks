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
  public function show($id)
  {
      // Fetch the product by ID
      $product = Product::findOrFail($id);
      
      // Return the product details as JSON response
      return Inertia::render('ProductDetail', ['product' => $product]);
  }
}
