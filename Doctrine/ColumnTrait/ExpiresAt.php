<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait ExpiresAt
{
    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    protected ?\DateTimeImmutable $expires_at = null;

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expires_at;
    }

    public function setExpiresAt(?\DateTimeImmutable $expires_at): self
    {
        $this->expires_at = $expires_at;

        return $this;
    }
}
