<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUCCESS()
 * @method static static ERROR()
 * @method static static FAILED()
 */
final class Status extends Enum
{
    const SUCCESS = "success";
    const ERROR = "error";
    const FAILED = "failed";
}
