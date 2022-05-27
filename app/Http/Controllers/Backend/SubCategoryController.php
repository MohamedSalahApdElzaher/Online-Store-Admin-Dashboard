<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     /**
     * subcategory view page
     */
    public function Index()
    {
        $sub_categories = subcategory::all();
        $categories = category::all();
        return view('backend.subcategory.index', compact('sub_categories', 'categories'));
    }

    /**
     * Store SubCategory to db
     */
    public function StoreSubCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'subcategorie_name_en' => 'required',
                'subcategorie_name_ar' => 'required',
                'category_id' => 'required',
            ]
        );

        subcategory::insert([
            'subcategorie_name_en' => $request->subcategorie_name_en,
            'subcategorie_name_ar' => $request->subcategorie_name_ar, 
            'subcategorie_slug_en' => strtolower(str_replace(' ', '-', $request->subcategorie_name_en)), 
            'subcategorie_slug_ar' => strtolower(str_replace(' ', '_',  $request->subcategorie_name_ar)),       
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'SubCategory Inserted SuccessFully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifiction);
    }

    /**
     * SubCategory update view page
     */    
    public function UpdateSubCategoryView($id)
    {
        $cat = subcategory::findOrFail($id);
        $categories = category::all();
        return view('backend.subcategory.edit', compact('cat', 'categories'));
    }

    /**
     * Update SubCategory
     */   
    public function UpdateSubCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'subcategorie_name_en' => 'required',
                'subcategorie_name_ar' => 'required',
                'category_id' => 'required',
            ]
        );

        subcategory::find($request->id)->update([
            'subcategorie_name_en' => $request->subcategorie_name_en,
            'subcategorie_name_ar' => $request->subcategorie_name_ar,
            'subcategorie_slug_en' => strtolower(str_replace(' ', '-', $request->subcategorie_name_en)),
            'subcategorie_slug_ar' => str_replace(' ', '_', $request->subcategorie_name_ar),
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'SubCategory Updated SuccessFully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subcategory')->with($notifiction);
    }


    /**
     * SubCategory delete
     */
    public function DeleteSubCategory($id)
    {
        subcategory::findOrFail($id)->delete();
        $notifiction = array(
            'message' => 'SubCategory Deleted SuccessFully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notifiction);
    }
 
}
