@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <div class="row" style="margin: 10px;">

        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category en</th>
                                    <th>Category ar</th>
                                    <th>Category Icon</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cat)
                                <tr>
                                    <td>{{$cat->categorie_name_en}}</td>
                                    <td>{{$cat->categorie_name_ar}}</td>
                                    <td><span><i class="{{$cat->categorie_icon}}"></i></span></td>
                                    <td>
                                        <a href="{{url('category/update/view/'.$cat->id)}}" class="btn btn-warning" title='Edit Data'><i class="fa fa-edit"></i></a>
                                        <a href="{{url('category/delete/'.$cat->id)}}" class="btn btn-danger" id="delete" title='Delete Data'><i class="fa fa-trash"></i></a>

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
                    <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('category.store')}}" style="padding: 5px;">
                    @csrf
                    <div class="form-group">
                        <label class="info-title">Category Name En <span>*</span></label>
                        <input type="text" name="categorie_name_en" class="form-control unicase-form-control text-input">
                        @error('categorie_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Category Name Ar <span>*</span></label>
                        <input type="text" name="categorie_name_ar" class="form-control unicase-form-control text-input">
                        @error('categorie_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Category Icon <span>*</span></label>
                        <input type="text" name="categorie_icon"class="form-control unicase-form-control text-input">
                        @error('categorie_icon')
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