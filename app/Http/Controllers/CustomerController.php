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
            'product_id' => 'required|exists:products,id',  // Keep this to validate product existence
            'quantity' => 'required|integer|min:1',
            'payment' => 'required|string',
            'VAT' => 'required|numeric|min:0',
        ]);

        $product = Product::find($validatedData['product_id']);
        $quantity = $validatedData['quantity'];
        $rate = $product->Rate;
        $amount = $rate * $quantity;
        $VAT = $validatedData['VAT'];
        $total_amount = $amount + ($amount * ($VAT / 100));
        $remarks = $validatedData['payment'];

        $customer = Customer::create([
            'customer_name' => $validatedData['customer_name'],
            'PAN_VAT' => $validatedData['PAN_VAT'],
            'address' => $validatedData['address'],
            'product_name' => $product->product_name,  // Store product name directly
            'quantity' => $quantity,
            'payment' => $validatedData['payment'],
            'VAT' => $VAT,
        ]);

        Sale::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'amount' => $amount,
            'total_amount' => $total_amount,
            'remarks' => $remarks,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer and sales created successfully');
    }
}
