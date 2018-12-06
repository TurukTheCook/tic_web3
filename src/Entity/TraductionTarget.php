<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TraductionTargetRepository")
 */
class TraductionTarget
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
     * @ORM\ManyToOne(targetEntity="App\Entity\TraductionSource", inversedBy="traductionTargets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $traductionSource;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $target;

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

    public function getTraductionSource(): ?TraductionSource
    {
        return $this->traductionSource;
    }

    public function setTraductionSource(?TraductionSource $traductionSource): self
    {
        $this->traductionSource = $traductionSource;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }
}
