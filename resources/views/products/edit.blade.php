@extends('layouts.app')

@section('content')
<section class="product py-5">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Edit Product</h5>
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="BN">BN</label>
                                <input type="text" name="BN" class="form-control" value="{{ $product->BN }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exp_date">Expiry Date</label>
                                <input type="date" name="exp_date" class="form-control" value="{{ $product->exp_date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="Stock_Balance">Stock Balance</label>
                                <input type="number" name="Stock_Balance" class="form-control" value="{{ $product->Stock_Balance }}">
                            </div>
                            <div class="form-group">
                                <label for="Rate">Rate</label>
                                <input type="text" name="Rate" class="form-control" value="{{ $product->Rate }}" required>
                            </div>
                            <div class="form-group">
                                <label for="MOU">MOU</label>
                                <input type="text" name="MOU" class="form-control" value="{{ $product->MOU }}" required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Update Product</button>
                        </form>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Product</button>
                        </form>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
