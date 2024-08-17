<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('customer', ['customers' => $customers, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'PAN_VAT' => 'required',
            'address' => 'required',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment' => 'required|string',
            'VAT' => 'required|numeric|min:0',
            'MOU' => 'required|string',  // Added MOU validation
        ]);

        $product = Product::find($validatedData['product_id']);
        $quantity = $validatedData['quantity'];

        // Calculate remaining stock
        $totalStock = $product->Stock_Balance;
        $soldQuantity = Customer::where('product_name', $product->product_name)->sum('quantity');
        $remainingStock = $totalStock - $soldQuantity;

        // Validate quantity
        if ($quantity > $remainingStock) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['quantity' => "Requested quantity ($quantity) exceeds available stock ($remainingStock)."])->withInput();
        }

        // Calculate amounts
        $rate = $product->Rate;
        $amount = $rate * $quantity;
        $VAT = $validatedData['VAT'];
        $total_amount = $amount + ($amount * ($VAT / 100));
        $remarks = $validatedData['payment'];

        // Create new customer record
        $customer = Customer::create([
            'customer_name' => $validatedData['customer_name'],
            'PAN_VAT' => $validatedData['PAN_VAT'],
            'address' => $validatedData['address'],
            'product_name' => $product->product_name,
            'quantity' => $quantity,
            'payment' => $validatedData['payment'],
            'VAT' => $VAT,
            'MOU' => $validatedData['MOU'],  // Added MOU field
        ]);

        // Create new sale record
        Sale::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'amount' => $amount,
            'total_amount' => $total_amount,
            'remarks' => $remarks,
        ]);

        // Update stock balance
        $product->Stock_Balance -= $quantity;
        $product->save();

        return redirect()->route('customers.index')->with('success', 'Customer and sales created successfully');
    }
}
