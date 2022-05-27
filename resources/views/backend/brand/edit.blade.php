@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="row" style="margin: 10px;">
    <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Brand</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('update.store')}}" enctype="multipart/form-data" style="padding: 5px;">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Brand Name En <span>*</span></label>
                        <input value="{{$selected_brand->brand_name_en}}" type="text" name="brand_name_en" class="form-control unicase-form-control text-input">
                        @error('brand_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Brand Name Ar <span>*</span></label>
                        <input value="{{$selected_brand->brand_name_ar}}"  type="text" name="brand_name_ar" class="form-control unicase-form-control text-input">
                        @error('brand_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Brand Image <span>*</span></label>
                      <br>
                        <input type="file" name="brand_image">
                        @error('brand_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br><br>
                        <img src="{{asset($selected_brand->brand_image)}}" style="width: 100px; height: 70px;">
                        <input type="hidden" name="old_img" value="{{$selected_brand->brand_image}}">
                        <input type="hidden" name="id" value="{{$selected_brand->id}}">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>


@endsection