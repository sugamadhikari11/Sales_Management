@extends('layouts.app')

@section('content')
<section class="customer py-5">
    <div class="container">
        <!-- Display Customers -->
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Customer List</h5>
                        @if ($customers->isEmpty())
                            <p class="text-center">No customers available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">PAN/VAT</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Product Purchased</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">VAT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->PAN_VAT }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td>{{ $customer->product_name }}</td>
                                            <td>{{ $customer->quantity }}</td>
                                            <td>{{ $customer->payment }}</td>
                                            <td>{{ $customer->VAT }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Customer Form -->
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add New Customer</h5>
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" id="customer_name" name="customer_name" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="PAN_VAT">PAN/VAT</label>
                                <input type="text" id="PAN_VAT" name="PAN_VAT" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="product_id">Product Purchased</label>
                                <select id="product_id" name="product_id" class="form-control" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="MOU">MOU</label>
                                <select id="MOU" name="MOU" class="form-control" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->MOU }}">{{ $product->MOU }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="payment">Payment Status</label>
                                <input type="text" id="payment" name="payment" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="VAT">VAT (%)</label>
                                <input type="number" id="VAT" name="VAT" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Add Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
