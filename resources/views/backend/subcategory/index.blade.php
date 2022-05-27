@extends('admin.admin_master')

@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <div class="row" style="margin: 10px;">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>SubCategory en</th>
                                    <th width='10%'>SubCategory ar</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_categories as $cat)
                                <tr>
                                    <td>{{$cat->category->categorie_name_en}}</td>
                                    <td>{{$cat->subcategorie_name_en}}</td>
                                    <td>{{$cat->subcategorie_name_ar}}</td>
                                    <td>
                                        <a href="{{url('subcategory/update/view/'.$cat->id)}}" class="btn btn-warning" title='Edit Data'><i class="fa fa-edit"></i></a>
                                        <a href="{{route('subcategory.delete', $cat->id)}}" class="btn btn-danger" id="delete" title='Delete Data'><i class="fa fa-trash"></i></a>

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
        <div class="col-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('subcategory.store')}}" style="padding: 5px;">
                    @csrf

                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">

                            <select name="category_id" id="select" required class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->categorie_name_en}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="info-title">SubCategory Name En <span>*</span></label>
                        <input type="text" name="subcategorie_name_en" class="form-control unicase-form-control text-input">
                        @error('subcategorie_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">SubCategory Name Ar <span>*</span></label>
                        <input type="text" name="subcategorie_name_ar" class="form-control unicase-form-control text-input">
                        @error('subcategorie_name_ar')
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