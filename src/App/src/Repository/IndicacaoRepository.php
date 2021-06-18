<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Indicacao;
use App\Entity\Status;
use Doctrine\ORM\EntityRepository;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Class IndicacaoRepository
 * @package App\Repository
 */
class IndicacaoRepository extends EntityRepository implements RepositoryInterface
{

    public function insert(array $data): array
    {
        try {

            $status = $this->_em->find(Status::class, 1);

            $entity = new Indicacao();
            $entity->setNome($data['nome']);
            $entity->setEmail($data['email']);
            $entity->setCpf($data['cpf']);
            $entity->setTelefone($data['telefone']);
            $entity->setStatus($status);

            $classMethods = new ClassMethodsHydrator();
            $classMethods->hydrate($data, $entity);

            $this->_em->persist($entity);
            $this->_em->flush();

            $data['status'] = $entity->getStatus()->toArray();
            return $data;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update($data)
    {
        $status = $this->_em->find(Status::class, $data['status']);
        $data['status'] = $status;
        $entity = $this->_em->getReference($this->_entityName, $data['id']);

        $classMethods = new ClassMethodsHydrator();
        $classMethods->hydrate($data, $entity);

        $this->_em->persist($entity);
        $this->_em->flush();

        $data = $entity->toArray();
        $data['status'] = $entity->getStatus()->toArray();
        return $data;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getAll(): array
    {
        try {
            $allIndicacao = $this->findAll();
            $indicacaoDataAsArray = [];

            foreach ($allIndicacao as $key => $object) {
                $indicacaoDataAsArray[] = $object->toArray();
                if ($object->getStatus()) {
                    $indicacaoDataAsArray[$key]['status'] = $object->getStatus()->toArray();
                }
            }

            return $indicacaoDataAsArray;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getOne(int $id): array
    {
        try {
            $entity = $this->findOneBy(['id' => $id]);
            return !empty($entity) ? $entity->toArray() : [];
        } catch (\Exception $e) {
            throw $e;
        }
    }
}