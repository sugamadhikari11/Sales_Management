<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Optional date filtering
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $salesQuery = Sale::with('customer', 'product');

        if ($startDate && $endDate) {
            $salesQuery->whereBetween('created_at', [new Carbon($startDate), new Carbon($endDate)]);
        }

        $sales = $salesQuery->get();

        // Calculate total sales amount
        $totalSalesAmount = $sales->sum('total_amount');

        // Calculate total sales per month
        $salesPerMonth = $sales->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m'); // grouping by months
        });

        // Calculate most sales and least sales month
        $mostSalesMonth = $salesPerMonth->sortByDesc(function($month) {
            return $month->sum('total_amount');
        })->keys()->first();

        $leastSalesMonth = $salesPerMonth->sortBy(function($month) {
            return $month->sum('total_amount');
        })->keys()->first();

        return view('report', [
            'sales' => $sales,
            'totalSalesAmount' => $totalSalesAmount,
            'mostSalesMonth' => $mostSalesMonth,
            'leastSalesMonth' => $leastSalesMonth,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
