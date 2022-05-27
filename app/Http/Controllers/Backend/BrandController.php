<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /*
     * brand view
     * compact data to the view
    */
    public function Index()
    {
        $brands = brand::all();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Store brand to database
     */
    public function StoreBrand(Request $request)
    {
        $validateData = $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_ar' => 'required',
                'brand_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'brand_name_en.required' => 'English Name should not be empty',
                'brand_name_ar' => 'Arabic Name should not be empty',
                'brand_image' => 'Please Select an Image',
            ]
        );

        $image = $request->file('brand_image');
        $image_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $image_generation);
        $saveUrl = 'upload/brand/' . $image_generation;

        brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_ar' => str_replace(' ', '_', $request->brand_name_ar),
            'brand_image' => $saveUrl,
            'created_at' => Carbon::now(),
        ]);
        $notifiction = array(
            'message' => 'Brand Inserted SuccessFully',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notifiction);
    }

    /**
     * update brand view
     */
    public function UpdateBrandView($id)
    {
        $selected_brand = brand::findOrFail($id);
        return view('backend.brand.edit', compact('selected_brand'));
    }

    /**
     * update brand action
     */
    public function UpdateBrand(Request $request)
    {
        $validateData = $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_ar' => 'required',
                'brand_image' => 'mimes:jpeg,png,jpg,gif,svg',
            ]
        );

        $id = $request->id;
        $image = $request->file('brand_image');
        if ($image) {
            $image_generation = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $image_generation);
            $saveUrl = 'upload/brand/' . $image_generation;
            unlink($request->old_img);
            brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => str_replace(' ', '_', $request->brand_name_ar),
                'brand_image' => $saveUrl,
                'updated_at' => Carbon::now(),
            ]);
        }else{
            brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => str_replace(' ', '_', $request->brand_name_ar),
                'updated_at' => Carbon::now(),
            ]);
        }

        $notifiction = array(
            'message' => 'Brand Updated SuccessFully',
            'alert-type' => 'info'
        );
        return Redirect::route('all.brands')->with($notifiction);
    }

    /**
     * delete brand
     * TODO : NOT DELETE
     */
    public function DeleteBrand($id){
      $brand = brand::findOrFail($id);    
      unlink($brand->brand_image);
      $brand->delete();
      $notifiction = array(
        'message' => 'Brand Deleted SuccessFully',
        'alert-type' => 'error'
    );
    return Redirect::back()->with($notifiction);
    }
}
