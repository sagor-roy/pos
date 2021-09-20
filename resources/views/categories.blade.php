@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Categories
                </h4>
                <span><a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-primary">Add Categories</a></span>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="{{ route('admin.cate-store') }}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" class="form-control" name="category" placeholder="Enter your category">
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show as $row)
                        <tr>
                            <td>{{ $row->cate }}</td>
                            <td>{{ $row->slug }}</td>
                            <td><a href="javascript:void()" data-toggle="modal" data-target="#edit{{ $row->id }}" class="btn btn-sm btn-primary py-1 px-2"><i class="fas fa-edit"></i></a> <a href="{{ route('admin.cate-delete',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{ route('admin.cate-edit',$row->id) }}" method="POST">
                                    @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <input type="text" class="form-control" name="category" value="{{ $row->cate }}" required>
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
