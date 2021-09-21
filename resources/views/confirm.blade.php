@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <div class="d-flex justify-content-between">
                <h4>
                    Invoice
                </h4>
            </div>
        </section>

        <div class="px-3 py-2">
            <div class="card card-body">
                <div class="d-flex justify-content-between">
                    <div class="left-side text-center">
                        <img width="60" class="rounded-circle" src="{{ asset('uploads/customer/'.$customer->img) }}" alt="img">
                        <h5>{{ $customer->name }}</h5>
                        <p>Phone : {{ $customer->number }}</p>
                        <p>Address : {{ $customer->address }}</p>
                    </div>
                    <div class="right-side text-center">
                        <h5>Order Date : {{ $date->created_at->toDayDateTimeString() }}</h5>
                        <p>Order Status : <span class="text-capitalize badge badge-danger">Pending</span></p>
                        <p>Order ID : {{ $date->order_id }}</p>
                    </div>
                </div>

                <div class="mt-5">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($item as $row)
                          <tr>
                            <td><img width="60" src="{{ asset('uploads/product/'.$row->product->img) }}" alt="img"></td>
                            <td>{{ $row->product->name }}</td>
                            <td>{{ $row->product->code }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ number_format($row->price * $row->qty, 0) }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="float-right">
                        <h5>VAT : 2%</h5>
                        <h5>Total : {{ number_format($order->total, 0); }}&#2547;</h5>
                        <h5>Pay : {{ number_format($order->pay, 0); }}&#2547;</h5>
                        <h5>Due : {{ number_format($order->due, 0); }}&#2547;</h5>
                        <a href="{{ route('admin.all-order') }}" class="btn btn-primary rounded-0">ORDER</a>
                    </div> --}}
                </div>
            </div>
        </div>
</div>
@endsection
