@extends('layouts.backend')

@section('content')
<div class="content-body">

    <div id="add_customer">
        <section class="content-header">
            <h1>
                Add Customer    </h1>
         </section>
         <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label>Customer Name <span class="required_star">*</span></label>
                                        <input tabindex="1" autocomplete="off" type="text" name="name" class="form-control" placeholder="Customer Name" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label>Phone <span class="required_star">*</span></label>
                                        <input tabindex="2" autocomplete="off" type="text" name="phone" class="form-control integerchk" placeholder="Phone" value="">
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input tabindex="3" autocomplete="off" type="text" name="email" class="form-control" placeholder="Email" value="">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address <span class="required_star">*</span></label>
                                        <textarea tabindex="2" name="address" class="form-control" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer Photo</label>
                                        <input type="file" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.customer') }}"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>
                        </form>            </div>
                </div>
            </div>
        </section>
    </div>


</div>
@endsection
