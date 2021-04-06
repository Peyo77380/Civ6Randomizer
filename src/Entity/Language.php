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
     * @ORM\ManyToMany(targetEntity=Localization::class, mappedBy="language")
     */
    private $localizations;

    public function __construct()
    {
        $this->leaderTranslates = new ArrayCollection();
        $this->localizations = new ArrayCollection();
        
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
     * @return Collection|Localization[]
     */
    public function getLocalizations(): Collection
    {
        return $this->localizations;
    }

    public function addLocalization(Localization $localization): self
    {
        if (!$this->localizations->contains($localization)) {
            $this->localizations[] = $localization;
            $localization->addLanguage($this);
        }

        return $this;
    }

    public function removeLocalization(Localization $localization): self
    {
        if ($this->localizations->removeElement($localization)) {
            $localization->removeLanguage($this);
        }

        return $this;
    }

    
}
