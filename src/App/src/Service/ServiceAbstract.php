<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Class ServiceAbstract
 * @package App\Service
 */
abstract class ServiceAbstract
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var string
     */
    protected $entity;

    /**
     * ServiceAbstract constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getAll();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getOne(int $id): array
    {
        try {
            $repository = $this->em->getRepository($this->entity);
            return $repository->getOne($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function create(array $data): array
    {
        try {
            $repostory = $this->em->getRepository($this->entity);
            return $repostory->create($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function insert(array $data): array
    {
        try {
            $entity = new $this->entity();

            $classMethods = new ClassMethodsHydrator();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws \Exception
     */
    public function update(array $data): array
    {
        try {
            $entity = $this->em->getReference($this->entity, $data['id']);

            $classMethods = new ClassMethodsHydrator();
            $classMethods->hydrate($data, $entity);

            $this->em->persist($entity);
            $this->em->flush();

            return $entity->toArray();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function delete(int $id): void
    {
        try {
            $entity = $this->em->getReference($this->entity, $id);

            $this->em->remove($entity);
            $this->em->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}