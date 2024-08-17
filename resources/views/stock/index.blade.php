@extends('layouts.default')

@section('content')

<style>
    @font-face {
        font-family: 'Georgia Pro Light';
        src: url("{{ asset('public/fonts/GeorgiaPro-Light.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    section, div, h5, p, tr, th, td {
        font-family: 'Georgia Pro Light', serif;
    }

    body {
        height: auto;
        background: linear-gradient(to right, #ff9b40, #709fff);
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<section class="stock py-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Stock Information</h5>
                        @if ($stocks->isEmpty())
                            <p class="text-center">No stock data available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Total Stock Received</th>
                                        <th>Stock Sold</th>
                                        <th>Remaining Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->product_name }}</td>
                                        <td>{{ $stock->total_stock }}</td>
                                        <td>{{ $stock->sold_quantity }}</td>
                                        <td>{{ $stock->remaining_stock }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection