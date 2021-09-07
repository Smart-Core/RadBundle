<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

trait DeletedAt
{
    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    protected ?\DateTimeInterface $deleted_at = null;

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTimeInterface $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function setIsDeleted(bool $is_deleted): self
    {
        $this->deleted_at = $is_deleted ? new \DateTime() : null;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted_at ? true : false;
    }

    public function getIsDeleted(): bool
    {
        return $this->isDeleted();
    }

    public function getIsDeletedAsText(): string
    {
        return $this->deleted_at ? 'Yes' : 'No';
    }
}
