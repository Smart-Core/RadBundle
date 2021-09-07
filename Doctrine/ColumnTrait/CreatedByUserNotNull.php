<?php

declare(strict_types=1);

namespace SmartCore\RadBundle\Doctrine\ColumnTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

trait CreatedByUserNotNull
{
    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     * @ORM\JoinColumn(nullable=false)
     */
    #[ORM\ManyToOne(targetEntity: UserInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected $created_by_user;

    /**
     * @return \App\Entity\User|UserInterface
     */
    public function getCreatedByUser(): UserInterface
    {
        return $this->created_by_user;
    }

    public function setCreatedByUser(UserInterface $created_by_user): self
    {
        $this->created_by_user = $created_by_user;

        return $this;
    }
}
