<?php

namespace App\Entity;

use App\Entity\Localization;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CountryTranslateRepository;

/**
 * @ORM\Entity(repositoryClass=CountryTranslateRepository::class)
 */
class CountryTranslate extends Localization
{
    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="countryTranslates")
     * @ORM\JoinColumn(nullable=true)
     */
    private $country;

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
}
