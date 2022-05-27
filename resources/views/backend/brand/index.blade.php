@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <div class="row" style="margin: 10px;">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brands</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Brand en</th>
                                    <th>Brand ar</th>
                                    <th>Brand Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->brand_name_en}}</td>
                                    <td>{{$brand->brand_name_ar}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" style="width: 70px; height: 40px"></td>
                                    <td>
                                        <a href="{{url('brand/update/view/'.$brand->id)}}" class="btn btn-warning" title='Edit Data'><i class="fa fa-edit"></i></a>
                                        <a href="{{route('brand.delete', $brand->id)}}" class="btn btn-danger" id="delete" title='Delete Data'><i class="fa fa-trash"></i></a>

                                    </td>

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data" style="padding: 5px;">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Brand Name En <span>*</span></label>
                        <input type="text" name="brand_name_en" class="form-control unicase-form-control text-input">
                        @error('brand_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Brand Name Ar <span>*</span></label>
                        <input type="text" name="brand_name_ar" class="form-control unicase-form-control text-input">
                        @error('brand_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Brand Image <span>*</span></label>
                        <input type="file" name="brand_image">
                        @error('brand_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
</div>




@endsection