<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PemissionsProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;

        $this->middleware(['can:profiles']);

    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.Profiles.permissions.permissions', compact('profile', 'permissions'));
    }

  

    public function permissionsAvaliable(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);
      
     
       
       return view('admin.pages.Profiles.permissions.avaliable', compact('profile', 'permissions', 'filters'));

    }  
    
    public function attachPermissionProfile(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }
        if(!$request->permissions || count($request->permissions)==0){
            return redirect()
                        ->back()
                        ->with('message', 'Precisa escolher pelo menos uma permissão');
        }
      
      $profile->permissions()->attach($request->permissions);

      return redirect()->route('profile.permissions', $profile->id);

    }

    public function detachpermissionsAvaliable($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->back();
        //return redirect()->route('profile.permissions', $profile->id);
    }

    public function profiles($idPermission)
    {
        if (!$permission = $this->permission->find($idPermission)) {
            
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }

}
