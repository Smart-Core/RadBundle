<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait EmailUniqueNotNull
{
    /**
     * @ORM\Column(type="string", length=120, nullable=false, unique=true)
     *
     * @Assert\Email(mode="strict")
     * @Assert\Length(max=120)
     */
    #[ORM\Column(type: Types::STRING, length: 120, nullable: false, unique: true)]
    #[Assert\Email(mode: 'strict')]
    #[Assert\Length(max: 120)]
    protected string $email;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = trim($email);

        return $this;
    }
}
