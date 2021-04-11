<?php

namespace App\Entity;

use App\Entity\Localization;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LeaderTranslateCountryRepository;

/**
 * @ORM\Entity(repositoryClass=LeaderTranslateCountryRepository::class)
 */
class LeaderTranslateCountry extends Localization
{

    /**
     * @ORM\ManyToOne(targetEntity=Leader::class, inversedBy="leaderTranslateCountries")
     * @ORM\JoinColumn(nullable=true)
     */
    private $leaderCountry;

    public function getLeaderCountry(): ?Leader
    {
        return $this->leaderCountry;
    }

    public function setLeaderCountry(?Leader $leaderCountry): self
        $this->leaderCountry = $leaderCountry;

        return $this;
    }
}
