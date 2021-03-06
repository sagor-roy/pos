@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Customer List
                </h4>
                <span><a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-primary">Add Customer</a></span>
            </div>
        </section>

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
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show as $row)
                        <tr>
                            <td><img width="50" src="{{ asset('uploads/customer/'.$row->img) }}" alt="img"></td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->number }}</td>
                            <td>{{ $row->address }}</td>
                            <td><a href="javascript:void()" data-toggle="modal" data-target="#edit{{ $row->id }}" class="btn btn-sm btn-primary py-1 px-2"><i class="fas fa-edit"></i></a> <a href="{{ route('admin.customer-delete',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('admin.customer-edit',$row->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Customre Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $row->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone</label>
                                        <input type="number" class="form-control" name="number" value="{{ $row->number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <textarea name="address" rows="4" class="form-control" placeholder="Enter your address" required>{{ $row->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Customer Image</label>
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <img width="70" src="{{ asset('uploads/customer/'.$row->img) }}" alt="img">
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
