@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Product List
                </h4>
                <span><a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-primary">Add Product</a></span>
            </div>
        </section>

         <!-- Modal -->
         <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('admin.product-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your product name">
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select your category</option>
                            @foreach ($show as $row)
                            <option value="{{ $row->id }}">{{ $row->cate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter product price">
                    </div>
                    <div class="form-group">
                        <label for="name">Product Image</label>
                        <input type="file" class="form-control-file" name="image">
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

        <div class="px-3 py-2">
            @if(session('message'))
                <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }}">{{ session('message') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-body">
                <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $row)
                        <tr>
                            <td><img width="70" src="{{ asset('uploads/product/'.$row->img) }}" alt="img"></td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->cate->cate }}</td>
                            <td>{{ $row->code }}</td>
                            <td>{{ number_format($row->price, 0); }}&#2547;</td>
                            <td><a href="javascript:void()" data-toggle="modal" data-target="#edit{{ $row->id }}" class="btn btn-sm btn-primary py-1 px-2"><i class="fas fa-edit"></i></a> <a href="{{ route('admin.product-delete',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>
                         <!-- Modal -->
                        <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('admin.product-edit',$row->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $row->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <select name="category" class="form-control">
                                            <option value="">Select your category</option>
                                            @foreach ($show as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $row->cate_id ? 'selected':'' }}>{{ $item->cate }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Price</label>
                                        <input type="number" name="price" class="form-control" value="{{ $row->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Image</label>
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <img width="70" src="{{ asset('uploads/product/'.$row->img) }}" alt="img">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                </table>
            </div>
        </div>
</div>
@endsection
