<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Error;

class LanguageFixtures extends Fixture
{

    public const LANG_RU_REFERENCE = 'ru';
    public const LANG_EN_REFERENCE = 'en';
    public const LANG_FR_REFERENCE = 'fr';
   
    public const LANGUAGES = [
        ['ref' => self::LANG_EN_REFERENCE, 'name' => 'english', 'iso' => 'EN'],
        ['ref' => self::LANG_RU_REFERENCE, 'name' => 'russian', 'iso' => 'RU'],
        ['ref' => self::LANG_FR_REFERENCE, 'name' => 'french', 'iso' => 'FR'],
    ];

    public function load(ObjectManager $manager)
    {
        // loop through languages array
        foreach (LanguageFixtures::LANGUAGES as $lang) {
            $language = new Language();
            $language->setName($lang['name'])
                ->setIso($lang['iso']);
            $manager->persist($language);

            $this->addReference($lang['ref'], $language);
    
          }

        $manager->flush();
          
    }
}
