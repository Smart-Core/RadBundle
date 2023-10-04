<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait UpdatedAtTz
{
    /**
     * @ORM\Column(type="datetimetz_mutable", nullable=true)
     */
    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    protected ?\DateTime $updated_at = null;

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at?->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    }

    public function setUpdatedAt(?\DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
