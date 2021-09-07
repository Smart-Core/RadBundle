<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

trait Content
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    #[ORM\Column(type: 'text', nullable: true)]
    protected ?string $content = null;

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content === null ? null : trim($content);

        return $this;
    }
}
