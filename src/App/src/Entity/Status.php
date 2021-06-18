<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="status_id_seq", allocationSize=1, initialValue=1)
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=200, nullable=false)
     */
    private string $descricao;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethodsHydrator())->extract($this);
    }




}
