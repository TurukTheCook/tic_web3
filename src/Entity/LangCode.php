<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LangCodeRepository")
 */
class LangCode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $langCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangCode(): ?string
    {
        return $this->langCode;
    }

    public function setLangCode(string $langCode): self
    {
        $this->langCode = $langCode;

        return $this;
    }
}
