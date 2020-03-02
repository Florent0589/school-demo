<?php

namespace App\Http\Controllers;

use App\Module;
use App\User;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modules = Module::orderBy('name', 'asc')->paginate(10);
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $modules = Module::all();
        return view('modules.create', compact('users', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $form_data = \request()->all();

        $new_module                 = new Module();
        $new_module->name           = $form_data['name'];
        $new_module->parent_id      = $form_data['module_id'];
        $new_module->code           = $form_data['code'];
        $new_module->author_id      = $form_data['user_id'];
        $new_module->description    = $form_data['description'];
        $new_module->permissions    = $form_data['permissions'];
        $new_module->created_by     = Auth::id();
        $new_module->status_id      = 1;
        $new_module->save();

        $arrPermissions = explode(',', $new_module->permissions);
        foreach($arrPermissions as $permission)
        {
                $role_permission            = new Permission();
                $role_permission->name      = $permission;
                $role_permission->module_id = $new_module->id;
                $role_permission->save();
        }

        return redirect('/modules')->with('success', 'Successfully saved new Module Details');
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
        $module = Module::find($id);
        $users = User::all();
        $modules = Module::all();
        return view('modules.edit', compact('users', 'modules', 'module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $form_data = \request()->all();

        $new_module                 =  Module::find($id);
        $new_module->name           = $form_data['name'];
        $new_module->parent_id      = $form_data['module_id'];
        $new_module->code           = $form_data['code'];
        $new_module->author_id      = $form_data['user_id'];
        $new_module->description    = $form_data['description'];
        $new_module->permissions    = $form_data['permissions'];
        $new_module->save();

        $arrPermissions = explode(',', $new_module->permissions);
        foreach($arrPermissions as $permission)
        {
            $permission_exits = Permission::where(['name' => $permission, 'module_id' => $id])->first();
            if(!isset($permission_exits->id))
            {
                $role_permission            = new Permission();
                $role_permission->name      = $permission;
                $role_permission->module_id = $new_module->id;
                $role_permission->save();
            }   
        }

        return redirect('/modules')->with('success', 'Successfully Updated Module Details');
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
