<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class StatusRepository
 * @package App\Repository
 */
class StatusRepository extends EntityRepository
{
    /**
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        try {
            $allStatus = $this->findAll();
            $statusDataToArray = [];

            foreach ($allStatus as $object) {
                $statusDataToArray[] = $object->toArray();
            }

            return $statusDataToArray;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}