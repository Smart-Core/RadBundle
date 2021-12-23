<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait NameUnique
{
    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     *
     * @Assert\Length(max=255)
     */
    #[ORM\Column(type: 'string', length: 255, nullable: false, unique: true)]
    #[Assert\Length(max: 255)]
    protected string $name;

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = trim((string) $name);

        return $this;
    }
}
