<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('teste-acl', function(){
    dd(auth()->user()->permissions());
});

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){

            
    /**
     * Routes Profiles
     */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');
            
    /**
     * Routes Tenants
     */
    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');
    
    /**
     * Routes Table
     */
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController'); 
    
    /**
     * Product x Category
     */
    Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
    Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
    Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
    Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
    Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');

    /**
     * Routes Products
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');  

    /**
     * Routes Categories
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');  

    /**
     * Routes Profiles
     */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');   
    
    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profile.plans');      

    /** 
     * Permisions x Profile
     */
    Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PemissionsProfileController@detachpermissionsAvaliable')->name('profile.permissions.detach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PemissionsProfileController@permissionsAvaliable')->name('profile.permissions.avaliable');
    Route::post('profiles/{id}/permissions/store', 'ACL\PemissionsProfileController@attachPermissionProfile')->name('profile.permissions.attach');
    Route::get('profiles/{id}/permissions', 'ACL\PemissionsProfileController@permissions')->name('profile.permissions');
    Route::get('permissions/{id}/profile', 'ACL\PemissionsProfileController@profiles')->name('permissions.profiles');
     /**
     * Routes Permissions
     */
    Route::any('permissions/search', 'ACL\permissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\permissionController');        
     /**
     * Routes Profiles
     */
    Route::any('profile/search', 'ACL\ProfileController@search')->name('profile.search');
    Route::resource('profile', 'ACL\ProfileController');        
    /**
     * Routes Details Plans
     */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    /**
     * Routes Plans
     */
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    
    
    Route::get('/', 'PlanController@index')->name('admin.index');

    
});

/**
* Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

Auth::routes();


