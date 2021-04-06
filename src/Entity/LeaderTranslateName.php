<?php

namespace App\Entity;

use App\Entity\Localization;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LeaderTranslateNameRepository;

/**
 * @ORM\Entity(repositoryClass=LeaderTranslateNameRepository::class)
 */
class LeaderTranslateName extends Localization
{
    
    /**
     * @ORM\ManyToOne(targetEntity=Leader::class, inversedBy="leaderTranslateNames")
     * @ORM\JoinColumn(nullable=false)
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
