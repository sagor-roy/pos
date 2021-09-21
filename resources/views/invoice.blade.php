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
                <div class="row">
                    <div class="col-6">
                        <img width="60" class="rounded-circle" src="" alt="img">
                        <h5>Sagor Roy</h5>
                        <p>Phone : +880178785</p>
                        <p>Address : Dhaka</p>
                    </div>
                    <div class="col-6 text-right">
                        <h5>Order Date : 5465464</h5>
                        <p>Order Status : +880178785</p>
                        <p>Order ID : Dhaka</p>
                    </div>
                </div>

                <div class="mt-5">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <h5>Sub-Total : 56465&#2547;</h5>
                        <h6>VAT (2%) : 45&#2547;</h6>
                        <h4>Total : 46546&#2547;</h4>
                    </div>
                    <div class="card-footer text-right">
                        <a href="" class="btn btn-primary rounded-0">Submit</a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
