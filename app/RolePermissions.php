<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    //
    protected $table = 'role_permissions';

    public function getRolePermissions($role_id)
    {
            $role_permissions = RolePermissions::where('role_id', $role_id)->get();
            $arrPermission    = [];

            foreach ($role_permissions as $key => $value) {
                $permission = Permission::find($value->permission_id);
                $arrPermission[$value->permission_id] = $permission->name;
            }
            return $arrPermission;
    }
}
