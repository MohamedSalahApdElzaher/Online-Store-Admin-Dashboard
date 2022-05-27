@extends('admin.admin_master')

@section('admin')

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Admin Change Password</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{route('admin.update.password')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="current_password" type="password" name="current_password" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="password" type="password" name="new_password" data-validation-match-match="password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Confirm New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="password_confirmation" type="password" name="confirm_password" data-validation-match-match="password" class="form-control" required>
                                    </div>
                                </div>

                                <input class="btn btn-rounded btn-warning mb-5" type="submit" value="Change">
                    </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>

@endsection