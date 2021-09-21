@extends('layouts.backend')

<style>
    form.d-flex.qty-form > input {
    width: 75%;
}
</style>

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Product Order
                </h4>
            </div>
        </section>


        <div class="px-3 py-2">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $row)
                                <tr>
                                    <td>{{ $row->product->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.qty-update',$row->id) }}" method="POST" class="d-flex qty-form">
                                            @csrf
                                            <input type="number" name="qty" value="{{ $row->qty }}" min="1">
                                            <button type="submit" class="border-0 bg-success px-2"><i class="fas fa-undo"></i></button>
                                        </form>
                                    </td>
                                    <td>{{ number_format($row->price * $row->qty, 0); }}&#2547;</td>
                                    <td><a href="{{ route('admin.cart-delete',$row->id) }}" class="btn btn-sm btn-danger py-1 px-2"><i class="fas fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                        </table>
                        <div class="text-center bg-primary p-3">
                            <h6>Qty : {{ $qty }}</h6>
                            <h5>Sub-total : {{ number_format($sub, 0); }}&#2547;</h5>
                            <h5>Vat (2%) : {{ number_format($vat, 0); }}&#2547;</h5>
                            <hr>
                            <h4>Total : {{ number_format($total, 0); }}&#2547;</h4>
                        </div>
                        <form action="{{ route('admin.order') }}" method="POST">
                            @csrf
                        <div class="mt-3 text-center">
                            <h5>Select Cutomer</h5>
                            <div class="d-flex">
                                <select name="customer" class="form-control mr-2" required>
                                    <option value="">Select customer</option>
                                    @foreach($customer as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-primary float-right">Add Customer</a>
                            </div>
                            <div class="form-group mt-3">
                                <select name="payment_method" class="form-control" required>
                                    <option value="">Select your payment method</option>
                                    <option value="hand cash">Hand Cash</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                    <option value="dutch bangla">Dutch Bangla</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount" placeholder="Enter your amount" required>
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="qty" value="{{ $qty }}">
                            </div>
                            <button class="btn btn-sm btn-primary mt-3" type="submit">Create Invoice</button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-6">
                        @if(session('message'))
                            <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }}">{{ session('message') }}</div>
                        @endif
                        <table id="data-table" class="table table-responsive table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($show as $row)
                                <tr>
                                    <td><img width="70" src="{{ asset('uploads/product/'.$row->img) }}" alt="img"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->cate->cate }}</td>
                                    <td>{{ number_format($row->price, 0); }}&#2547;</td>
                                    <td><a href="{{ route('admin.cart-store',$row->id) }}" class="btn btn-sm btn-primary p-2"><i class="fas fa-shopping-cart"></i></a></td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('admin.customer-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Customre Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="number" class="form-control" name="number" placeholder="Enter your number" required>
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <textarea name="address" rows="4" class="form-control" placeholder="Enter your address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Customer Image</label>
                    <input type="file" class="form-control-file" name="image" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection
