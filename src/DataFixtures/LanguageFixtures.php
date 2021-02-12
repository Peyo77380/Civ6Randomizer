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
        ['name' => 'english', 'iso' => 'EN'],
        ['name' => 'russian', 'iso' => 'RU'],
        ['name' => 'french', 'iso' => 'FR'],
    ];

    public function load(ObjectManager $manager)
    {
        // loop through languages array
        foreach (LanguageFixtures::LANGUAGES as $lang) {
            $language = new Language();
            $language->setName($lang['name'])
                ->setIso($lang['iso']);
            $manager->persist($language);

            switch ($lang['iso']) 
            {
                case 'EN':
                    $this->addReference(LanguageFixtures::LANG_EN_REFERENCE, $language);
                    break;
                case 'RU':
                    $this->addReference(LanguageFixtures::LANG_RU_REFERENCE, $language);
                    break;
                case 'FR':
                    $this->addReference(LanguageFixtures::LANG_FR_REFERENCE, $language);
                    break;
                default:
                    throw new Error("Non existing language iso passed as parameter");
                    break;
            }
            
            
          }

        $manager->flush();
          
    }
}
