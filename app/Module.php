<?php

namespace App;
use App\Permission;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //

    protected $table = 'modules';

    public function getModulePermissions($module_id)
    {
            $module_permissions = Permission::where('module_id', $module_id)->get();
            $arrPermission    = [];

            foreach ($module_permissions as $value) {
                $arrPermission[$value->id] = $value->name;
            }
            return $arrPermission;
    }
}
