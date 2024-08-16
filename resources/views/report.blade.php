@extends('layouts.default')

@section('content')
<style>
    @font-face {
        font-family: 'Georgia Pro Light';
        src: url("{{ asset('public\fonts\GeorgiaPro-Light.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    body, div, form, table, thead, th, td, label, input, button, h2, h4, p {
        font-family: 'Georgia Pro Light', serif;
    }

    body {
        height: auto;
        background: linear-gradient(to right, #ff9b40, #709fff);
        background-size: 100% 100vh;
        background-repeat: no-repeat;
    }

    .content {
      background-color: white;
      padding: 3rem;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="content mt-5">
    <h2>Sales Report</h2>

    <!-- Date Filter Form -->
    <form action="{{ route('report.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-4">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-4">
                <label for="search">Search Customer or Product</label>
                <input type="text" id="search" name="search" class="form-control" value="{{ $search }}" placeholder="Enter customer or product name">
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-block mt-2">Search</button>
            </div>
        </div>
    </form>

    <!-- Summary Statistics -->
    <div class="mb-4">
        <h4>Total Sales: RS {{ number_format($totalSalesAmount, 2) }}</h4>
        <p>Most Sales Month: {{ $mostSalesMonth ? Carbon\Carbon::parse($mostSalesMonth)->format('F Y') : 'N/A' }}</p>
        <p>Least Sales Month: {{ $leastSalesMonth ? Carbon\Carbon::parse($leastSalesMonth)->format('F Y') : 'N/A' }}</p>
    </div>

    <!-- Sales Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Taxable Amount</th>
                <th scope="col">VAT</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Payment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->customer->customer_name }}</td>
                    <td>{{ $sale->product->product_name }}</td>
                    <td>{{ $sale->customer->quantity }}</td>
                    <td>RS {{ $sale->amount }}</td>
                    <td>{{ $sale->customer->VAT}}
                    <td>RS {{ $sale->total_amount }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    <td>{{ $sale->remarks }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
