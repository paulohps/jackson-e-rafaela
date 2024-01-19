<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class UserRoles extends Enum implements LocalizedEnum
{
    public const ADMIN = 'admin';
    public const GUEST = 'guest';
}
