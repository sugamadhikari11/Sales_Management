<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Return the view with the products data
        return view('product', ['products' => $products]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'BN' => 'required|string',
            'exp_date' => 'required|date',
            'MOU' => 'required|string',
            'stock_balance' => 'required|integer',
        ]);

        // Create a new product using the validated data
        Product::create($validatedData);

        // Redirect back to the product list page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
}
