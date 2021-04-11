<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Entity\CountryTranslate;
use App\DataFixtures\LanguageFixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CountryFixtures extends Fixture implements DependentFixtureInterface
{
    const COUNTRIES = ['RUS' => [
        'RU' =>'Россия',
        'EN' => 'Russia',
        'FR' => 'Russie',
    ], 'GBR' => [
        'RU' =>'Соединенное Королевство',
        'EN' => 'United Kingdom',
        'FR' => 'Royaume Uni',
    ], 'FRA' => [
        'RU' =>'Франция',
        'EN' => 'France',
        'FR' => 'France',
    ]];

    public function load(ObjectManager $manager)
    {
     
        $ref = [];
        $ref[] = [
          'iso' => 'RU', 
          'ref' => $this->getReference(LanguageFixtures::LANG_RU_REFERENCE)
        ];
        $ref[] = [
          'iso' => 'EN', 
          'ref' => $this->getReference(LanguageFixtures::LANG_EN_REFERENCE)
        ];
        $ref[] = [
          'iso' => 'FR', 
          'ref' => $this->getReference(LanguageFixtures::LANG_FR_REFERENCE)
        ];

        foreach (CountryFixtures::COUNTRIES as $iso) {
            $country = new Country();
            $country->setIso($iso); 

            $manager->persist($country);

            foreach($ref as $lang) {

                $translation = new CountryTranslate();
                $translation->addLanguage($lang['ref']);
                $translation->setCountry($country);
                $translation->setTranslation($lang[$ref['iso']]);
                $manager->persist($translation);

            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
      return array(
        LanguageFixtures::class,
      );
    }
}
