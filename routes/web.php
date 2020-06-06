<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

    
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
     * Home Dashboard
     */
    Route::get('/', 'Admin\PlanController@index')->name('adminHome.index');
