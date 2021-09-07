<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

trait CreatedByUser
{
    /**
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     */
    #[ORM\ManyToOne(targetEntity: UserInterface::class)]
    protected ?UserInterface $created_by_user = null;

    /**
     * @return \App\Entity\User|UserInterface|null
     */
    public function getCreatedByUser(): ?UserInterface
    {
        return $this->created_by_user;
    }

    public function setCreatedByUser(?UserInterface $created_by_user = null): self
    {
        $this->created_by_user = $created_by_user;

        return $this;
    }
}
