<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $iso;

    /**
     * @ORM\OneToMany(targetEntity=CountryTranslate::class, mappedBy="Country", orphanRemoval=true)
     */
    private $countryTranslates;

    public function __construct()
    {
        $this->countryTranslates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|CountryTranslate[]
     */
    public function getCountryTranslates(): Collection
    {
        return $this->countryTranslates;
    }

    public function addCountryTranslate(CountryTranslate $countryTranslate): self
    {
        if (!$this->countryTranslates->contains($countryTranslate)) {
            $this->countryTranslates[] = $countryTranslate;
            $countryTranslate->setCountry($this);
        }

        return $this;
    }

    public function removeCountryTranslate(CountryTranslate $countryTranslate): self
    {
        if ($this->countryTranslates->removeElement($countryTranslate)) {
            // set the owning side to null (unless already changed)
            if ($countryTranslate->getCountry() === $this) {
                $countryTranslate->setCountry(null);
            }
        }

        return $this;
    }
}
