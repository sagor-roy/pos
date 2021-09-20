@extends('layouts.backend')

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
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                </tr>
                        </table>
                        <div class="text-center bg-primary p-3">
                            <h6>Qty : 10</h6>
                            <h5>Sub-total : 4545&#2547;</h5>
                            <h5>Vat : 7&#2547;</h5>
                            <hr>
                            <h4>Total : 456456&#2547;</h4>
                        </div>
                        <div class="mt-3 text-center">
                            <h5>Select Cutomer</h5>
                            <select name="customer" class="form-control">
                                <option value="">Select customer</option>
                                <option value="">Select customer</option>
                                <option value="">Select customer</option>
                                <option value="">Select customer</option>
                            </select>
                            <button class="btn btn-sm btn-primary mt-3" type="submit">Invoice</button>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                <tr>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
