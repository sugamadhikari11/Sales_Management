<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function index()
    {
        // Get the total stock, sold quantity, and calculate remaining stock for each product
        $stocks = Product::select('product_name')
            ->selectRaw('SUM(stock_balance) as total_stock')
            ->selectRaw('(SELECT COALESCE(SUM(quantity), 0) FROM customers WHERE customers.product_name = products.product_name) as sold_quantity')
            ->selectRaw('SUM(stock_balance) - (SELECT COALESCE(SUM(quantity), 0) FROM customers WHERE customers.product_name = products.product_name) as remaining_stock')
            ->groupBy('product_name')
            ->get();

        return view('stock.index', compact('stocks'));
    }
}