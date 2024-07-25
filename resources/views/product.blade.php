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
                                    <th>Stock Added</th>
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

                        <!-- Search Form -->
                        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="query" class="form-control" placeholder="Search by Product Name or BN" value="{{ request()->input('query') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                                </div>
                            </div>
                        </form>

                        <h5 class="card-title">Normal Products</h5>
                        @if ($normalProducts->isEmpty())
                            <p class="text-center">No normal products available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">BN</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Stock Added</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">MOU</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($normalProducts as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->BN }}</td>
                                            <td>{{ $product->exp_date }}</td>
                                            <td>{{ $product->Stock_Balance }}</td>
                                            <td>{{ $product->Rate }}</td>
                                            <td>{{ $product->MOU }}</td>
                                            <td>
                                            <button 
                                                class="btn btn-warning" 
                                                data-toggle="modal" 
                                                data-target="#editModal" 
                                                data-id="{{ $product->id }}" 
                                                data-name="{{ $product->product_name }}" 
                                                data-bn="{{ $product->BN }}" 
                                                data-exp_date="{{ $product->exp_date }}" 
                                                data-stock_balance="{{ $product->Stock_Balance }}" 
                                                data-rate="{{ $product->Rate }}" 
                                                data-mou="{{ $product->MOU }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $product->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <h5 class="card-title mt-5">Expired Products</h5>
                        @if ($expiredProducts->isEmpty())
                            <p class="text-center">No expired products available.</p>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">BN</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Stock Added</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">MOU</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expiredProducts as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->BN }}</td>
                                            <td>{{ $product->exp_date }}</td>
                                            <td>{{ $product->Stock_Balance }}</td>
                                            <td>{{ $product->Rate }}</td>
                                            <td>{{ $product->MOU }}</td>
                                            <td>
                                                <button 
                                                    class="btn btn-warning" 
                                                    data-toggle="modal" 
                                                    data-target="#editModal" 
                                                    data-id="{{ $product->id }}" 
                                                    data-name="{{ $product->product_name }}" 
                                                    data-bn="{{ $product->BN }}" 
                                                    data-exp_date="{{ $product->exp_date }}" 
                                                    data-stock_balance="{{ $product->Stock_Balance }}" 
                                                    data-rate="{{ $product->Rate }}" 
                                                    data-mou="{{ $product->MOU }}">
                                                    Edit
                                                </button>
                                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $product->id }}">Delete</button>
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

<!-- Edit Product Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" action="{{ route('products.update', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_product_name">Product Name</label>
                        <input type="text" name="product_name" id="edit_product_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_bn">BN</label>
                        <input type="text" name="BN" id="edit_bn" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_exp_date">Expiry Date</label>
                        <input type="date" name="exp_date" id="edit_exp_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_stock_balance">Stock Balance</label>
                        <input type="number" name="Stock_Balance" id="edit_stock_balance" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_rate">Rate</label>
                        <input type="number" name="Rate" id="edit_rate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_mou">MOU</label>
                        <input type="text" name="MOU" id="edit_mou" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var bn = button.data('bn');
        var exp_date = button.data('exp_date');
        var stock_balance = button.data('stock_balance');
        var rate = button.data('rate');
        var mou = button.data('mou');

        var modal = $(this);
        modal.find('#edit_product_name').val(name);
        modal.find('#edit_bn').val(bn);
        modal.find('#edit_exp_date').val(exp_date);
        modal.find('#edit_stock_balance').val(stock_balance);
        modal.find('#edit_rate').val(rate);
        modal.find('#edit_mou').val(mou);

        var editFormAction = "{{ route('products.update', '') }}/" + id;
        modal.find('#editProductForm').attr('action', editFormAction);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var productId = button.data('id'); // Extract info from data-* attributes
        var action = "{{ route('products.destroy', ':id') }}".replace(':id', productId);
        var modal = $(this);
        modal.find('#deleteForm').attr('action', action);
    });
});
</script>
@endsection
