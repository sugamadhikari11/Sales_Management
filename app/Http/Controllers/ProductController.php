<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Fetch the search query from the request
        $query = $request->input('query');

        // Check if a search query is provided
        if ($query) {
            // Filter products based on the search query
            $products = Product::where('product_name', 'LIKE', "%{$query}%")
                        ->orWhere('BN', 'LIKE', "%{$query}%")
                        ->get();
        } else {
            // Fetch all products if no search query is provided
            $products = Product::all();
        }

        // Categorize products as "Normal" or "Expired"
        $currentDate = Carbon::now();
        $normalProducts = $products->filter(function ($product) use ($currentDate) {
            return Carbon::parse($product->exp_date)->gte($currentDate);
        });

        $expiredProducts = $products->filter(function ($product) use ($currentDate) {
            return Carbon::parse($product->exp_date)->lt($currentDate);
        });

        // Return the view with the products data
        return view('product', [
            'normalProducts' => $normalProducts,
            'expiredProducts' => $expiredProducts,
            'query' => $query
        ]);
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
        $request->validate([
            'product_name' => 'required',
            'BN' => 'required',
            'exp_date' => 'required|date',
            'Stock_Balance' => 'numeric',
            'Rate' => 'required|numeric',
            'MOU' => 'required',
        ]);
        
        // Create a new product using the validated data
        Product::create($request->all());

        // Redirect back to the product list page with a success message
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'BN' => 'required',
            'exp_date' => 'required|date',
            'Stock_Balance' => 'numeric',
            'Rate' => 'required|numeric',
            'MOU' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
