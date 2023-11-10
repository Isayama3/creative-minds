<?php

use Core\Admin\Admin\Models\Permission;

use Helper\Lang;
use Illuminate\Support\Arr;

function ___($key)
{
    return Arr::get(Lang::$lang, $key) ?? $key;
}

function resourcePermissions($group, $unit, $route, $ignore = [])
{
    $arr = [
        'عرض' => 'index',
        'اضافة' => 'store',
        'تفاصيل' => 'show',
        'تعديل' => 'update',
        'حذف' => 'destroy',
    ];
    foreach ($arr as $key => $value) {
        if (in_array($value, $ignore))
            continue;

        Permission::firstOrCreate([
            'name' => $key . ' ' . $unit,
            'routes' => $route . $value,
            'group' => $group,
        ]);
    }
}

function singlePermission($group, $name, $route)
{
    Permission::firstOrCreate([
        'name' => $name,
        'routes' => $route,
        'group' => $group,
    ]);
}
