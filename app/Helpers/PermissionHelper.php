<?php
/**
 * Created by PhpStorm.
 * User: mklooster
 * Date: 17-9-2018
 * Time: 16:53
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class PermissionHelper
{
    public static function has($permission) {
        return self::hasPermission($permission);
    }

    public static function can($permission) {
        if(!self::hasPermission($permission)) {
            abort(403);
        }
    }

    private static function hasPermission($permission) {
        $user = Auth::user();
        $hasPermission = $user->roles()
            ->whereHas('permissions', function($query) use ($permission) {
                $query->where('permissions.name', $permission);
            })
            ->exists();
        //dd($hasPermission, $permission, $user->roles()->whereHas('permissions')->exists(), $user->roles()->exists());
        return $hasPermission;
    }
}