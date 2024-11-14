<?php

namespace App\Filament\Resources;

use BezhanSalleh\FilamentShield\Resources\RoleResource as BaseRoleResource;

class RoleResource extends BaseRoleResource
{
    public static function getNavigationGroup(): ?string
    {
        return 'User Management';
    }

    public static function getNavigationParentItem(): ?string
    {
        return 'Users';
    }
}