<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customers::all();
        return view('customers', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'PAN_VAT' => 'required',
            'address' => 'required',
        ]);

        Customers::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }
}
