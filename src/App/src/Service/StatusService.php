<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Status;

/**
 * Class StatusService
 * @package App\Service
 */
class StatusService extends ServiceAbstract
{
    protected $entity = Status::class;
}