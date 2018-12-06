<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LangCode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $langCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TraductionSource", mappedBy="projectId", orphanRemoval=true)
     */
    private $traductionSources;

    public function __construct()
    {
        $this->traductionSources = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLangCode(): ?LangCode
    {
        return $this->langCode;
    }

    public function setLangCode(?LangCode $langCode): self
    {
        $this->langCode = $langCode;

        return $this;
    }

    /**
     * @return Collection|TraductionSource[]
     */
    public function getTraductionSources(): Collection
    {
        return $this->traductionSources;
    }

    public function addTraductionSource(TraductionSource $traductionSource): self
    {
        if (!$this->traductionSources->contains($traductionSource)) {
            $this->traductionSources[] = $traductionSource;
            $traductionSource->setProjectId($this);
        }

        return $this;
    }

    public function removeTraductionSource(TraductionSource $traductionSource): self
    {
        if ($this->traductionSources->contains($traductionSource)) {
            $this->traductionSources->removeElement($traductionSource);
            // set the owning side to null (unless already changed)
            if ($traductionSource->getProjectId() === $this) {
                $traductionSource->setProjectId(null);
            }
        }

        return $this;
    }
}
