@extends('layouts.backend')

@section('content')
<div class="content-body">
    <div id="dashboard">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Business Intelligence</small>
            </h1>
        </section>


        <div class="row p-3">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box box4column">
                    <div class="inner" style="color: #231f54;border-color:#231f54">
                        <h3>121</h3>

                        <p>Undelivered Orders</p>
                    </div>
                    <div class="icon">
                        <i style="color:#231f54;border-color:#231f54" class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="https://saforamart.com/orderManagement/orders" class="small-box-footer">Manage <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 16 16 12 12 8"></polyline>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box box4column">
                    <div class="inner" style="color: #231f54;border-color:#231f54">
                        <h3>121</h3>

                        <p>Total Orders</p>
                    </div>
                    <div class="icon">
                        <i style="color:#231f54;border-color:#231f54" class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="https://saforamart.com/orderManagement/orders" class="small-box-footer">Manage <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 16 16 12 12 8"></polyline>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box box4column">
                    <div class="inner" style="color: #231f54;border-color:#231f54">
                        <h3>56</h3>

                        <p>Customers</p>
                    </div>
                    <div class="icon">
                        <i style="color:#231f54;border-color:#231f54" class="fa fa-users"></i>
                    </div>
                    <a href="https://saforamart.com/Customer/customers" class="small-box-footer">Manage <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 16 16 12 12 8"></polyline>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box box4column">
                    <div class="inner" style="color: #231f54;border-color:#231f54">
                        <h3>574</h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i style="color:#231f54;border-color:#231f54" class="fa fa-list"></i>
                    </div>
                    <a href="https://saforamart.com/Item/products" class="small-box-footer">Manage <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-right-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 16 16 12 12 8"></polyline>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row p-3">
            <div class="col-lg-6">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-link"></i>
                        <h3 class="box-title">Quick Links</h3>
                    </div>
                    <div class="box-body quick-links txt-uh-90">

                        <div class="b">
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/orderManagement/orders"><span
                                    class="fa fa-dollar text-info"></span> Orders</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Inventory/inventory"><span
                                    class="fa fa-cube text-info"></span> Stock</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Expense/addEditExpense"><span
                                    class="fa fa-money text-info"></span>+ Expense</a>
                        </div>

                        <div class="b">
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Item/addEditItem"><span
                                    class="fa fa-book text-info"></span>+ Add Product</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/SupplierPayment/addSupplierPayment"><span
                                    class="fa fa-user text-info"></span>+ Supplier Payment</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Report/balanceSheet"><span
                                    class="fa fa-dollar text-info"></span> Balance Sheet</a>
                        </div>

                        <div class="b">
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Report/dailySummaryReport"><span
                                    class="fa fa-list text-info"></span> Daily Summary Report</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Purchase/addEditPurchase"><span
                                    class="fa fa-truck text-info"></span>+ Purchase</a>
                            <a class="btn icon-btn btn-info"
                                href="https://saforamart.com/Attendance/addEditAttendance"><span
                                    class="fa fa-clock-o text-info"></span>+ Attendance</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>






</div>
@endsection
