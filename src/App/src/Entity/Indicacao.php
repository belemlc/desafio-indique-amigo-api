<?php

declare(strict_types=1);

namespace App\Entity;

use Cassandra\Exception\ValidationException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Laminas\Hydrator\ClassMethodsHydrator;

/**
 * Indicacao
 *
 * @ORM\Table(name="indicacao", uniqueConstraints={@ORM\UniqueConstraint(name="indicacao_email_key", columns={"email"}), @ORM\UniqueConstraint(name="indicacao_cpf_key", columns={"cpf"})}, indexes={@ORM\Index(name="IDX_35D869116BF700BD", columns={"status_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\IndicacaoRepository")
 */
class Indicacao
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indicacao_id_seq", allocationSize=1, initialValue=1)
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=200, nullable=false)
     */
    private string $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=false)
     */
    private string $cpf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefone", type="string", length=15, nullable=true)
     */
    private string $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=150, nullable=false)
     */
    private string $email;

    /**
     * @var \Status
     *
     * @ORM\ManyToOne(targetEntity="Status", fetch="LAZY")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     * })
     */
    private $status;

    public function __construct() {
        // $this->status = new ArrayCollection();
//        $this->status = new Status();
    }

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
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string|null
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * @param string|null $telefone
     */
    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return App\Entity\Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     * @return Status
     */
    public function setStatus(Status $status): Status
    {
        $this->status = $status;
        return $status;
    }



    /**
     * @return array
     */
    public function toArray(): array
    {
        return (new ClassMethodsHydrator())->extract($this);
    }
}
