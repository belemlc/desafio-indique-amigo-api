<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Indicacao;
use App\Validator\CPFValidator;
use Exception;
use Laminas\Validator\EmailAddress;

/**
 * Class IndicacaoService
 * @package App\Service
 */
class IndicacaoService extends ServiceAbstract
{
    protected $entity = Indicacao::class;

    /**
     * Insert Indicacao
     *
     * @param array $data
     * @return array
     */
    public function insert(array $data): array
    {
        try {
            $this->validateCPF($data['cpf']);
            $this->validateEmail($data['email']);

            $repository = $this->em->getRepository($this->entity);

            return $repository->insert($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Update Indicacao
     *
     * @param array $data
     * @return array
     */
    public function update(array $data): array
    {
        try {

            $entity = $this->em->find($this->entity, $data['id']);

            if ( ! $entity) {
                throw new Exception('Indicação não existe.');
            }

            $cpf = $data['cpf'] ?? null;
            $email = $data['email'] ?? null;

            if ( ! empty($cpf) && $entity->getCpf() != $cpf) {
                $this->validateCPF($cpf);
            }

            $this->validateEmail($email);

            $repository = $this->em->getRepository($this->entity);

            return $repository->update($data);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Validate if cpf is valid or exists on database
     *
     * @param $cpf
     * @throws \Exception
     */
    private function validateCPF($cpf): void
    {
        try {
            $cpfValidator = new CPFValidator();

            if (!$cpfValidator->isValid($cpf)) {
                throw new \Exception('CPF inválido.');
            }

            $dql = "SELECT COUNT(1) total FROM App\Entity\Indicacao i WHERE i.cpf = '{$cpf}'";
            $query = $this->em->createQuery($dql);
            $result = $query->getResult();
            $cpfExist = $result[0]['total'] > 0 ? true : false;

            if ($cpfExist) {
                throw new \Exception('CPF já cadastrado.');
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Validate if email is valid or exists on database
     *
     * @param $email
     * @throws \Exception
     */
    private function validateEmail($email): void
    {
        try {
            $emailValidator = new EmailAddress();

            if ( ! empty($email) && ! $emailValidator->isValid($email) ) {
                throw new \Exception('Email inválido.');
            }
            
        } catch (\Exception $e) {
            throw $e;
        }
    }
}