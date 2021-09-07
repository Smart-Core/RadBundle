<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait DescriptionNotBlank
{
    /**
     * @ORM\Column(type="text", nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\NotNull()
     */
    #[ORM\Column(type: 'text', nullable: false)]
    #[Assert\NotBlank()]
    #[Assert\NotNull()]
    protected string $description = '';

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = trim((string) $description);

        return $this;
    }
}
