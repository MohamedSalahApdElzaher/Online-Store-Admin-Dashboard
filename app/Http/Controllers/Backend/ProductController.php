<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\MultiImg;
use App\Models\product;
use App\Models\subcategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * add view
     */
    public function addView()
    {
        $categories = category::latest()->get();
        $brands = brand::latest()->get();
        $sub_categories = subcategory::latest()->get();
        $sub_subcategories = SubSubCategory::latest()->get();
        return view('backend.products.addproduct', compact('categories', 'brands', 'sub_categories', 'sub_subcategories'));
    }

    /**
     * store product to db
     */
    public function StoreProduct(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);

        // if ($files = $request->file('file')) {
        //     $destinationPath = 'upload/pdf'; // upload path
        //     $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $digitalItem);
        // }
        
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $product_id = product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '_', $request->product_name_ar),
            'code' => $request->product_code,

            'quantity' => $request->product_qty,
            'tags_en' => $request->product_tags_en,
            'tags_ar' => $request->product_tags_ar,
            'size_en' => $request->product_size_en,
            'size_ar' => $request->product_size_ar,
            'color_en' => $request->product_color_en,
            'color_ar' => $request->product_color_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_descp_en,
            'short_description_ar' => $request->short_descp_ar,
            'long_description_en' => $request->long_descp_en,
            'long_description_ar' => $request->long_descp_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'thambnail' => $save_url,

            //'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'img_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage_product')->with($notification);
    }

    /**
     * manageProduct
     */
    public function manageProduct(){
        $products = product::latest()->get();
        return view('backend.products.manage', compact( 'products'));
    }

    public function updateView($id){
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $categories = category::latest()->get();
        $brands = brand::latest()->get();
        $sub_categories = subcategory::latest()->get();
        $sub_subcategories = SubSubCategory::latest()->get();
        $product = product::findOrFail($id);  
      return view('backend.products.edit', compact('product', 'categories', 'brands', 'sub_categories', 'sub_subcategories', 'multiImgs'));
    }

    public function update(Request $request){

         // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        // ]);

        // if ($files = $request->file('file')) {
        //     $destinationPath = 'upload/pdf'; // upload path
        //     $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $digitalItem);
        // }
        
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        product::findOrFail($request->id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ar' => $request->product_name_ar,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ar' => str_replace(' ', '_', $request->product_name_ar),
            'code' => $request->product_code,

            'quantity' => $request->product_qty,
            'tags_en' => $request->product_tags_en,
            'tags_ar' => $request->product_tags_ar,
            'size_en' => $request->product_size_en,
            'size_ar' => $request->product_size_ar,
            'color_en' => $request->product_color_en,
            'color_ar' => $request->product_color_ar,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_descp_en,
            'short_description_ar' => $request->short_descp_ar,
            'long_description_en' => $request->long_descp_en,
            'long_description_ar' => $request->long_descp_ar,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'thambnail' => $save_url,

            //'digital_file' => $digitalItem,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        unlink($request->old_img);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * update updateMultImg
     */
    public function updateMultImg(Request $request){
        $images = $request->multi_img;
        foreach($images as $id => $img){
            $oldImg = MultiImg::findOrFail($id);
            unlink($oldImg->img_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::where('id', $id)->update([
                'img_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ImageDelete($id){
        $img = MultiImg::FindOrFail($id);
        unlink($img->img_name);
        $img->delete();
        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
           'message' => 'Product Inactive',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }


 public function ProductActive($id){
     product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
           'message' => 'Product Active',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
        
    }

    public function deleteProduct($id){
        $product = product::FindOrFail($id);
        unlink($product->thambnail);
        $product->delete();
        $imgs = MultiImg::where('product_id', $id)->get();
        foreach($imgs as $img){
            unlink($img->img_name);
            $img->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'error'
        );
 
        return redirect()->back()->with($notification);
    }
}
