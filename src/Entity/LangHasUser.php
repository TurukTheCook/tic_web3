<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LangHasUserRepository")
 */
class LangHasUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LangCode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $langCode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="langsHasUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangCode(): ?LangCode
    {
        return $this->langCode;
    }

    public function setLangCode(?LangCode $langCode): self
    {
        $this->langCode = $langCode;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
