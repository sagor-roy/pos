@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Pending Orders
                </h4>
            </div>
        </section>

        <div class="px-3 py-2">
            <div class="card card-body">
                <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show as $row)
                        <tr>
                            <td>{{ $row->cus->name }}</td>
                            <td>{{ $row->created_at->toDateString() }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ number_format($row->total, 0) }}</td>
                            <td>{{ $row->payment_method }}</td>
                            @if ($row->status == null)
                            <td><span class="text-capitalize badge badge-danger">pending</span></td>
                            @else
                            <td><span class="text-capitalize badge badge-success">success</span></td>
                            @endif
                            <td><a href="" class="btn bg-info"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
</div>
@endsection
