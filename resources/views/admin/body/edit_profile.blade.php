@extends('admin.admin_master')

@section('admin')

<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Profile</h4>
            <h6 class="box-subtitle">Admin login Info</h6>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5>Admin Username <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{$adminEditData->name}}" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Email Addrress<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" value="{{$adminEditData->email}}" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                      

                                <div class="form-group">
                                    <div class="controls">
                                        <img src="{{ !empty($adminEditData->profile_photo_path) ? url(asset($adminEditData->profile_photo_path)) : url(asset('upload/no_image.jpg')) }}" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                      <input type="hidden" name="old_img" value="{{$adminEditData->profile_photo_path}}">

                                <div class="form-group">
                                    <h5>Upload Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <input class="btn btn-rounded btn-success mb-5" type="submit" value="Update">
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