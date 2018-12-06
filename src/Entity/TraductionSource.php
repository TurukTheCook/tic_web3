<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TraductionSourceRepository")
 */
class TraductionSource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="traductionSources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projectId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $source;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TraductionTarget", mappedBy="traductionSource", orphanRemoval=true)
     */
    private $traductionTargets;

    public function __construct()
    {
        $this->traductionTargets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectId(): ?Project
    {
        return $this->projectId;
    }

    public function setProjectId(?Project $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Collection|TraductionTarget[]
     */
    public function getTraductionTargets(): Collection
    {
        return $this->traductionTargets;
    }

    public function addTraductionTarget(TraductionTarget $traductionTarget): self
    {
        if (!$this->traductionTargets->contains($traductionTarget)) {
            $this->traductionTargets[] = $traductionTarget;
            $traductionTarget->setTraductionSource($this);
        }

        return $this;
    }

    public function removeTraductionTarget(TraductionTarget $traductionTarget): self
    {
        if ($this->traductionTargets->contains($traductionTarget)) {
            $this->traductionTargets->removeElement($traductionTarget);
            // set the owning side to null (unless already changed)
            if ($traductionTarget->getTraductionSource() === $this) {
                $traductionTarget->setTraductionSource(null);
            }
        }

        return $this;
    }
}
