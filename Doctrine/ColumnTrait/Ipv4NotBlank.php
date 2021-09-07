<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait Ipv4NotBlank
{
    /**
     * @ORM\Column(type="string", length=15, nullable=false)
     *
     * @Assert\Ip(version="4")
     * @Assert\Length(max=15)
     */
    #[ORM\Column(type: 'string', length: 15, nullable: false)]
    #[Assert\Ip(version: '4')]
    #[Assert\Length(max: 15)]
    protected string $ipv4;

    public function getIpv4(): string
    {
        return $this->ipv4;
    }

    public function setIpv4(string $ipv4): self
    {
        $this->ipv4 = trim($ipv4);

        return $this;
    }
}
