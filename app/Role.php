<?php

namespace App;

use App\RolePermissions;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    const ADMIN = 1;
    const TUTOR = 2;
    const GURDIAN = 4;
    const STUDENT = 3;

    static public function getAllMyPermission($id)
    {
        $arrMyPermisisons = [];
        $permissions = RolePermissions::where('role_id', $id)->get();
        foreach($permissions as $permission_id)
        {
            $permission = Permission::find($permission_id->permission_id);
            if(isset($permission->id))
                $arrMyPermisisons[] = $permission->name;
        }

        return $arrMyPermisisons;
    }

}
