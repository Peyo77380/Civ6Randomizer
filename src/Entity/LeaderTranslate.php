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
    

    public function getDataType(): ?Language
    {
        return $this->type;
    }

    public function setDataType(?Language $type): self
    {
        $this->type = $type;

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
    private $translation;

    public function getTranslation(): ?Leader
    {
        return $this->translation;
    } 

    public function setTranslation(?Leader $translation): self
    {
        $this->translation = $translation;

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
    private $translation;

    public function getTranslation(): ?Country
    {
        return $this->translation;
    }

    public function setTranslation(?Country $translation): self
    {
        $this->translation = $translation;

        return $this;
    }
}