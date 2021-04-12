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
    private $leader;

    public function getLeader(): ?Leader
    {
        return $this->leader;
    }

    public function setLeader(?Leader $leader): self
    {
        $this->leader = $leader;

        return $this;
    }
}
