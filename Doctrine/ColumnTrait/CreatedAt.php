<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

trait CreatedAt
{
    /**
     * @ORM\Column(type="datetime_immutable")
     */
    #[ORM\Column(type: 'datetime_immutable')]
    protected ?\DateTimeImmutable $created_at = null;

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
