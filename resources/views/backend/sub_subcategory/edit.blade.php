@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <div class="row" style="margin: 10px;">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update SUb SubCategory</h3>
                </div>
                <!-- /.box-header -->
                <form method="POST" action="{{route('update.sub_subcategory.store')}}" style="padding: 5px;">
                    @csrf
                   
                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">

                            <select name="category_id" id="select" required class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                 {{$category->id == $sub_subcategorie->category_id ? 'selected' : ''}}>
                                 {{$category->categorie_name_en}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                        <div class="controls">

                            <select name="subcategory_id" id="select" required class="form-control">
                                @foreach($subcategories as $category)
                                <option value="{{$category->id}}"
                                 {{$category->id == $sub_subcategorie->subcategory_id ? 'selected' : ''}}>
                                 {{$category->subcategorie_name_en}}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">SUb SubCategory Name En <span>*</span></label>
                        <input value="{{$sub_subcategorie->sub_subcategorie_name_en}}" type="text" name="sub_subcategorie_name_en" class="form-control unicase-form-control text-input">
                        @error('sub_subcategorie_name_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputPassword1">SUb SubCategory Name Ar <span>*</span></label>
                        <input value="{{$sub_subcategorie->sub_subcategorie_name_ar}}" type="text" name="sub_subcategorie_name_ar" class="form-control unicase-form-control text-input">
                        @error('sub_subcategorie_name_ar')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>    
                    
                    <input type="hidden" name="id" value="{{$sub_subcategorie->id}}">

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>


@endsection