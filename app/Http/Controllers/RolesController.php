<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\RolePermissions;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modules     = Module::all();
        $permissions = Permission::all();
        
        return view('roles.create', compact('permissions', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        $form_data = \request()->all();

        $new_role       = new Role();
        $new_role->name = $form_data['name'];
        $new_role->save();

        if(isset($new_role->id))
        {
            foreach ($form_data as $key => $value) {
                
                if(strpos($key, '_perm') != false)
                {
                        $new_role_permission                = new RolePermissions();
                        $new_role_permission->permission_id = $value;
                        $new_role_permission->role_id       = $new_role->id;
                        $new_role_permission->save();
                }
            }
        }

        return redirect('/roles')->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role             = Role::find($id);
        $role_permissions = RolePermissions::where('role_id', $id)->pluck('permission_id', 'permission_id')->toArray();
       
        $modules     = Module::all();
        $permissions = Permission::all();

        return view('roles.edit', compact('permissions', 'modules', 'role', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $form_data = \request()->all();

        $new_role = Role::find($id);
        $new_role->name = $form_data['name'];
        $new_role->save();

        
        foreach ($form_data as $key => $value) {
            
            if(strpos($key, '_perm') != false)
            {
                $role_permission = RolePermissions::where(['role_id' => $id, 'permission_id' => $value])->first();

                if(!isset($role_permission->id))
                {
                    $new_role_permission                = new RolePermissions();
                    $new_role_permission->permission_id = $value;
                    $new_role_permission->role_id       = $new_role->id;
                    $new_role_permission->save();
                }
                    
            }
        }
        

        return redirect('/roles')->with('success', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
