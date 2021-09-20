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
                        <tr>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>61</td>
                            <td>61</td>
                            <td>61</td>
                            <td>61</td>
                        </tr>
                </table>
            </div>
        </div>
</div>
@endsection
