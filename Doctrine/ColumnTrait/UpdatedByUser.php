<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

trait UpdatedByUser
{
    /**
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     */
    #[ORM\ManyToOne(targetEntity: UserInterface::class)]
    protected ?UserInterface $updated_by_user = null;

    /**
     * @return \App\Entity\User|UserInterface|null
     */
    public function getUpdatedByUser(): ?UserInterface
    {
        return $this->updated_by_user;
    }

    public function setUpdatedByUser(?UserInterface $updated_by_user = null): self
    {
        $this->updated_by_user = $updated_by_user;

        return $this;
    }
}
