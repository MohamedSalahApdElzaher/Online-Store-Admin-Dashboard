<?php
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\Sub_SubcategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;

/**
 * brand routes
 */
Route::prefix('brand')->middleware('auth:admin')->group(function () {
    Route::get('/view', [BrandController::class, 'Index'])->name('all.brands');
    Route::post('/store', [BrandController::class, 'StoreBrand'])->name('brand.store');
    Route::get('/update/view/{id}', [BrandController::class, 'UpdateBrandView']);
    Route::post('/update', [BrandController::class, 'UpdateBrand'])->name('update.store');
    Route::get('/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('brand.delete');
});

/**
 * category routes
 */
Route::prefix('category')->middleware('auth:admin')->group(function () {
    Route::get('/view', [CategoryController::class, 'Index'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'StoreCategory'])->name('category.store');
    Route::get('/update/view/{id}', [CategoryController::class, 'UpdateCategoryView']);
    Route::post('/update', [CategoryController::class, 'UpdateCategory'])->name('update.category.store');
    Route::get('/delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');
});

/**
 * subcategory routes
 */
Route::prefix('subcategory')->middleware('auth:admin')->group(function () {
    Route::get('/view', [SubCategoryController::class, 'Index'])->name('all.subcategory');
    Route::post('/store', [SubCategoryController::class, 'StoreSubCategory'])->name('subcategory.store');
    Route::get('/update/view/{id}', [SubCategoryController::class, 'UpdateSubCategoryView']);
    Route::post('/update', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory.store');
    Route::get('/delete/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('subcategory.delete');
});

/**
 * sub subcategory routes
 */
Route::prefix('sub_subcategory')->middleware('auth:admin')->group(function () {
    Route::get('/view', [Sub_SubcategoryController::class, 'Index'])->name('all.sub_subcategory');
    Route::post('/store', [Sub_SubcategoryController::class, 'StoreSub_SubCategory'])->name('sub_subcategory.store');
    Route::get('/update/view/{id}', [Sub_SubcategoryController::class, 'UpdateSub_SubCategoryView']);
    Route::post('/update', [Sub_SubcategoryController::class, 'UpdateSub_SubCategory'])->name('update.sub_subcategory.store');
    Route::get('/delete/{id}', [Sub_SubcategoryController::class, 'DeleteSub_SubCategory'])->name('sub_subcategory.delete');
});

/**
 * Products routes
 */
Route::prefix('product')->middleware('auth:admin')->group(function(){
    Route::get('/add-view', [ProductController::class, 'addView'])->name('add_product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage_product');
    Route::get('/update/view/{id}', [ProductController::class, 'updateView']);
    Route::post('/update/store', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete/{id}', [ProductController::class, 'deleteProduct']);
    Route::post('/update/multi_imgs/store', [ProductController::class, 'updateMultImg'])->name('update.multi_Img');
    Route::get('/image/delete/{id}', [ProductController::class, 'ImageDelete']);
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
});
