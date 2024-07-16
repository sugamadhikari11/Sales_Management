@extends('layouts.app')

@section('content')
<section class="product py-5">
    <div class="container">
        <!-- Display Products -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Product List</h5>
                        @if ($products->isEmpty())
                            <p class="text-center">No products available.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($products as $product)
                                    <li class="list-group-item">
                                        <h5>{{ $product->product_name }}</h5>
                                        <p><strong>BN:</strong> {{ $product->BN }}</p>
                                        <p><strong>Expiry Date:</strong> {{ $product->exp_date }}</p>
                                        <p><strong>MOU:</strong> {{ $product->MOU }}</p>
                                        <p><strong>Stock Balance:</strong> {{ $product->stock_balance }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Product Form -->
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add New Product</h5>
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="BN">BN</label>
                                <input type="text" id="BN" name="BN" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exp_date">Expiry Date</label>
                                <input type="date" id="exp_date" name="exp_date" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="MOU">MOU</label>
                                <input type="text" id="MOU" name="MOU" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="stock_balance">Stock Balance</label>
                                <input type="number" id="stock_balance" name="stock_balance" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
