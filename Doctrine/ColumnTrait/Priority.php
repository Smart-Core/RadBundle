<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait Priority
{
    /**
     * @ORM\Column(type="smallint", nullable=false, options={"default":0})
     *
     * @Assert\Range(min="-32000", max="32000")
     */
    #[ORM\Column(type: Types::SMALLINT, nullable: false, options: ['default' => 0])]
    #[Assert\Range(min: -32000, max: 32000)]
    protected int $priority = 0;

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = ($priority === null) ? 0 : $priority;

        return $this;
    }
}
