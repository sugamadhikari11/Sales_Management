@extends('layouts.app')

@section('content')
<section class="product py-5">
    <div class="container">
        <!-- Add New Product Form -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add New Product</h5>
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>Product Name</th>
                                    <th>BN</th>
                                    <th>Expiry Date</th>
                                    <th>Stock Balance</th>
                                    <th>Rate</th>
                                    <th>MOU</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="product_name" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="BN" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="date" name="exp_date" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="number" name="Stock_Balance" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="number" name="Rate" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="MOU" class="form-control" required>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary"style="width: 115%;">Add</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Products -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Product List</h5>
                        @if ($products->isEmpty())
                            <p class="text-center">No products available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">BN</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Stock Balance</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">MOU</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->BN }}</td>
                                            <td>{{ $product->exp_date }}</td>
                                            <td>{{ $product->Stock_Balance}}</td>
                                            <td>{{ $product->Rate }}</td>
                                            <td>{{ $product->MOU }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                            </td>
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
