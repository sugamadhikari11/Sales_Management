@extends('layouts.default')

@section('content')
<style>
    @font-face {
        font-family: 'Georgia Pro Light';
        src: url("{{ asset('public/fonts/GeorgiaPro-Light.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    section, div, h5, tr, th, td, form, label, input, select, option, button {
        font-family: 'Georgia Pro Light', serif;
    }
</style>

<section class="customer py-2">
    <div class="container">
        <!-- Display Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                                        <th scope="col">MOU</th>
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
                                            <td>{{ $customer->MOU }}</td>
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
                        <form id="add-customer-form" action="{{ route('customers.store') }}" method="POST">
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
                                        @if($product->exp_date >= now())
                                            <option value="{{ $product->id }}" data-stock="{{ $product->Stock_Balance - \App\Models\Customer::where('product_name', $product->product_name)->sum('quantity') }}">
                                                {{ $product->product_name }} (Batch No: {{ $product->BN }})
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="MOU">MOU</label>
                                <select id="MOU" name="MOU" class="form-control" required>
                                    @foreach ($products as $product)
                                        @if($product->exp_date >= now())
                                            <option value="{{ $product->MOU }}">{{ $product->MOU }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="payment">Payment Status</label>
                                <select id="payment" name="payment" class="form-control" required>
                                    <option value="Cash">Cash</option>
                                    <option value="Credit">Credit</option>
                                </select>
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add-customer-form');
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');

    productSelect.addEventListener('change', function () {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const remainingStock = selectedOption.getAttribute('data-stock');
        quantityInput.setAttribute('max', remainingStock);
    });

    form.addEventListener('submit', function (e) {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const remainingStock = selectedOption.getAttribute('data-stock');
        const quantity = quantityInput.value;

        if (quantity > remainingStock) {
            e.preventDefault();
            alert(`Quantity cannot exceed the available stock of ${remainingStock}.`);
        }
    });
});
</script>
@endsection

@endsection
