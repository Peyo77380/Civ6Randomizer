<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\LeaderTranslateName;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeaderRepository")
 */
class Leader
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game", mappedBy="leader")
     */
    private $games;

    /**
     * @ORM\Column(type="integer")
     */
    private $gamesCount;

    /**
     * @ORM\OneToMany(targetEntity=LeaderTranslateName::class, mappedBy="leader", orphanRemoval=true)
     */
    private $leaderTranslateNames;

    /**
     * @ORM\OneToMany(targetEntity=LeaderTranslateCountry::class, mappedBy="country")
     */
    private $leaderTranslateCountries;

    public function __construct()
    {
        $this->games = new ArrayCollection();
        $this->leaderTranslates = new ArrayCollection();
        $this->leaderTranslateNames = new ArrayCollection();
        $this->leaderTranslateCountries = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setLeader($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->contains($game)) {
            $this->games->removeElement($game);
            // set the owning side to null (unless already changed)
            if ($game->getLeader() === $this) {
                $game->setLeader(null);
            }
        }

        return $this;
    }

    public function getGamesCount(): ?int
    {
        return $this->gamesCount;
    }

    public function setGamesCount(int $gamesCount): self
    {
        $this->gamesCount = $gamesCount;

        return $this;
    }

    /**
     * Just set 1 game to games count
     *
     * @return Leader
     */
    public function addOneGame(): self
    {
        $this->gamesCount = $this->gamesCount + 1;

        return $this;
    }

    /**
     * @return Collection|LeaderTranslateName[]
     */
    public function getLeaderTranslateNames(): Collection
    {
        return $this->leaderTranslateNames;
    }

    public function addLeaderTranslateName(LeaderTranslateName $leaderTranslateName): self
    {
        if (!$this->leaderTranslateNames->contains($leaderTranslateName)) {
            $this->leaderTranslateNames[] = $leaderTranslateName;
            $leaderTranslateName->setLeader($this);
        }

        return $this;
    }

    public function removeLeaderTranslateName(LeaderTranslateName $leaderTranslateName): self
    {
        if ($this->leaderTranslateNames->removeElement($leaderTranslateName)) {
            // set the owning side to null (unless already changed)
            if ($leaderTranslateName->getLeader() === $this) {
                $leaderTranslateName->setLeader(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LeaderTranslateCountry[]
     */
    public function getLeaderTranslateCountries(): Collection
    {
        return $this->leaderTranslateCountries;
    }

    public function addLeaderTranslateCountry(LeaderTranslateCountry $leaderTranslateCountry): self
    {
        if (!$this->leaderTranslateCountries->contains($leaderTranslateCountry)) {
            $this->leaderTranslateCountries[] = $leaderTranslateCountry;
            $leaderTranslateCountry->setCountry($this);
        }

        return $this;
    }

    public function removeLeaderTranslateCountry(LeaderTranslateCountry $leaderTranslateCountry): self
    {
        if ($this->leaderTranslateCountries->removeElement($leaderTranslateCountry)) {
            // set the owning side to null (unless already changed)
            if ($leaderTranslateCountry->getCountry() === $this) {
                $leaderTranslateCountry->setCountry(null);
            }
        }

        return $this;
    }
}
