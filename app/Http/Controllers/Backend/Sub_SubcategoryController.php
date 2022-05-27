<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\category;
use App\Models\subcategory;
use Carbon\Carbon;

class Sub_SubcategoryController extends Controller
{
    /**
     * Index view page
     */
    public function Index()
    {
        $sub_subcategories = SubSubCategory::all();
        $categories = category::all();
        $subcategories = subcategory::all();
        return view('backend.sub_subcategory.index', compact('sub_subcategories', 'categories', 'subcategories'));
    }

    /**
     * add new sub subcategory to db
     */
    public function StoreSub_SubCategory(Request $request)
    {
        $validateData = $request->validate([
            'sub_subcategorie_name_en' => 'required',
            'sub_subcategorie_name_ar' => 'required'
        ]);

        SubSubCategory::insert([
            'sub_subcategorie_name_en' => $request->sub_subcategorie_name_en,
            'sub_subcategorie_name_ar' => $request->sub_subcategorie_name_ar,
            'sub_subcategorie_slug_en' => strtolower(str_replace(' ', '-', $request->sub_subcategorie_name_en)),
            'sub_subcategorie_slug_ar' => str_replace(' ', '_', $request->sub_subcategorie_name_ar),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'created_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'Sub SubCategory Inserted SuccessFully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifiction);
    }

    /**
     * update view
     */
    public function UpdateSub_SubCategoryView($id)
    {
        $sub_subcategorie = SubSubCategory::findOrFail($id);
        $categories = category::all();
        $subcategories = subcategory::all();
        return view('backend.sub_subcategory.edit', compact('sub_subcategorie', 'categories', 'subcategories'));
    }

    /**
     * update action
     */
    public function UpdateSub_SubCategory(Request $request)
    {
        SubSubCategory::findOrFail($request->id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategorie_name_en' => $request->sub_subcategorie_name_en,
            'sub_subcategorie_name_ar' => $request->sub_subcategorie_name_ar,
            'sub_subcategorie_slug_en' => strtolower(str_replace(' ', '-', $request->sub_subcategorie_name_en)),
            'sub_subcategorie_slug_ar' => str_replace(' ', '_', $request->sub_subcategorie_name_ar),
            'updated_at' => Carbon::now()
        ]);

        $notifiction = array(
            'message' => 'Sub SubCategory Updated SuccessFully',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.sub_subcategory')->with($notifiction);
    }

    public function DeleteSub_SubCategory($id){
        SubSubCategory::find($id)->delete();
        $notifiction = array(
            'message' => 'Sub SubCategory Deleted SuccessFully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notifiction);
    }
}
