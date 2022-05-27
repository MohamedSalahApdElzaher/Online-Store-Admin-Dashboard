@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="row" style="margin: 10px;">
    <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Category</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('update.category.store')}}" style="padding: 5px;">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Category Name En <span>*</span></label>
                        <input value="{{$cat->categorie_name_en}}" type="text" name="categorie_name_en" class="form-control unicase-form-control text-input">
                        @error('categorie_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">Category Name Ar <span>*</span></label>
                        <input value="{{$cat->categorie_name_ar}}"  type="text" name="categorie_name_ar" class="form-control unicase-form-control text-input">
                        @error('categorie_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Category Icon <span>*</span></label>
                      <br>
                        <input style="width: 150px;" type="text" name="categorie_icon" class="form-control unicase-form-control text-input" value="{{$cat->categorie_icon}}">             
                        @error('categorie_icon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="hidden" name="id" value="{{$cat->id}}">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>


@endsection