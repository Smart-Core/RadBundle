<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait UpdatedAtTz
{
    /**
     * @ORM\Column(type="datetimetz_immutable", nullable=true)
     */
    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    protected ?\DateTimeInterface $updated_at = null;

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at?->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
