<?php

namespace App\Entity;

use App\Entity\LeaderTranslate;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LeaderTranslateRepository;

/**
 * @ORM\MappedSuperclass
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Entity(repositoryClass=LeaderTranslateRepository::class)
 * @ORM\DiscriminatorColumn(name="dataType", type="integer")
 * @ORM\DiscriminatorMap({"1" = "LeaderTranslateName", "2" = "LeaderTranslateCountry"})
 */
abstract class LeaderTranslate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $dataType;

    /**
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="leaderTranslates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $language;

    /**
     * @ORM\Column(type="string")
     */
    private $translation;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }
    

    public function getDataType(): ?int
    {
        return $this->type;
    }

    public function setDataType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }



    public function getTranslation(): ?string
    {
        return $this->translation;
    } 

    public function setTranslation(?string $translation): self
    {
        $this->translation = $translation;

        return $this;
    }


}

/**
 * @ORM\Entity(repositoryClass=LeaderTranslateNameRepository::class)
 */
class LeaderTranslateName extends LeaderTranslate
{

    /**
     * @ORM\ManyToOne(targetEntity=Leader::class, inversedBy="leaderTranslates")
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

/**
 * @ORM\Entity(repositoryClass=LeaderTranslateCountryRepository::class)
 */
class LeaderTranslateCountry extends LeaderTranslate
{
    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="leaderTranslates")
     * @ORM\JoinColumn(nullable=false)
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