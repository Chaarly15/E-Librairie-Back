<?php

namespace App\Models\Enums;

use Illuminate\Support\Arr;

enum RoleEnum:string implements AdvancedEnumInterface
{
    use AdvancedEnum;

    case ADMIN = 'admin';
    case OWNER = "owner";
    case CLIENT = 'client';
    public function label(): string
    {
        return __("enums.role" . $this->value);
    }
}
