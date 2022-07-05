<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;

trait Text
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    #[ORM\Column(type: 'text', nullable: true)]
    protected ?string $text = null;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = ($text === null) ? null : trim($text);

        return $this;
    }
}
