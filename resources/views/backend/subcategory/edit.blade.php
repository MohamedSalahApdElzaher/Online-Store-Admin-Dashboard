@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="row" style="margin: 10px;">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('update.subcategory.store')}}" style="padding: 5px;">
                    @csrf
                   
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">

                            <select name="category_id" id="select" required class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                 {{$category->id == $cat->category_id ? 'selected' : ''}}>
                                 {{$category->categorie_name_en}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">SubCategory Name En <span>*</span></label>
                        <input value="{{$cat->subcategorie_name_en}}" type="text" name="subcategorie_name_en" class="form-control unicase-form-control text-input">
                        @error('subcategorie_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">SubCategory Name Ar <span>*</span></label>
                        <input value="{{$cat->subcategorie_name_ar}}" type="text" name="subcategorie_name_ar" class="form-control unicase-form-control text-input">
                        @error('subcategorie_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>    
                    
                    <input type="hidden" name="id" value="{{$cat->id}}">

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>


@endsection