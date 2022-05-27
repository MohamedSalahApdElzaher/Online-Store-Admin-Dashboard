<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * category view page
     */
    public function Index()
    {
        $categories = category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Store Category to db
     */
    public function StoreCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'categorie_name_en' => 'required',
                'categorie_name_ar' => 'required',
                'categorie_icon' => 'required',
            ]
        );

        category::insert([
            'categorie_name_en' => $request->categorie_name_en,
            'categorie_name_ar' => $request->categorie_name_ar,
            'categorie_slug_en' => strtolower(str_replace(' ', '-', $request->categorie_name_en)),
            'categorie_slug_ar' => str_replace(' ', '_', $request->categorie_name_ar),
            'categorie_icon' => $request->categorie_icon,
            'created_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'Category Inserted SuccessFully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notifiction);
    }

    /**
     * Category update view page
     */
    public function UpdateCategoryView($id)
    {
        $cat = category::findOrFail($id);
        return view('backend.category.edit', compact('cat'));
    }

    /**
     * Update Category
     */
    public function UpdateCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'categorie_name_en' => 'required',
                'categorie_name_ar' => 'required',
                'categorie_icon' => 'required',
            ]
        );

        category::find($request->id)->update([
            'categorie_name_en' => $request->categorie_name_en,
            'categorie_name_ar' => $request->categorie_name_ar,
            'categorie_slug_en' => strtolower(str_replace(' ', '-', $request->categorie_name_en)),
            'categorie_slug_ar' => str_replace(' ', '_', $request->categorie_name_ar),
            'categorie_icon' => $request->categorie_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'Category Updated SuccessFully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notifiction);
    }


    /**
     * Category delete
     */
    public function DeleteCategory($id)
    {
        category::findOrFail($id)->delete();
        $notifiction = array(
            'message' => 'Category Deleted SuccessFully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notifiction);
    }
}
