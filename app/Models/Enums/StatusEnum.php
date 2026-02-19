<?php
namespace App\Models\Enums;
    enum StatusEnum : string implements AdvancedEnumInterface
    {
        use AdvancedEnum;
        case PENDING = 'pending';
        case END = 'end';

        public function label(): string
        {
            return __("enums.status".$this->value);
        }

    }
