<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=3)
     * @Assert\Unique
     * 
     */
    private $iso;

    /**
     * @ORM\OneToMany(targetEntity=LeaderTranslate::class, mappedBy="language", orphanRemoval=true)
     */
    private $leaderTranslates;

    public function __construct()
    {
        $this->leaderTranslates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(string $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * @return Collection|LeaderTranslate[]
     */
    public function getLeaderTranslates(): Collection
    {
        return $this->leaderTranslates;
    }

    public function addLeaderTranslate(LeaderTranslate $leaderTranslate): self
    {
        if (!$this->leaderTranslates->contains($leaderTranslate)) {
            $this->leaderTranslates[] = $leaderTranslate;
            $leaderTranslate->setLanguage($this);
        }

        return $this;
    }

    public function removeLeaderTranslate(LeaderTranslate $leaderTranslate): self
    {
        if ($this->leaderTranslates->removeElement($leaderTranslate)) {
            // set the owning side to null (unless already changed)
            if ($leaderTranslate->getLanguage() === $this) {
                $leaderTranslate->setLanguage(null);
            }
        }

        return $this;
    }
}
