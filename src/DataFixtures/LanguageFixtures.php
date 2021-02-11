<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{

    public const LANG_RU_REFERENCE = 'ru';
    public const LANG_EN_REFERENCE = 'en';
    public const LANG_FR_REFERENCE = 'fr';
    
    const LANGUAGES = [
        ['name' => 'english', 'iso' => 'EN'],
        ['name' => 'russian', 'iso' => 'RU'],
        ['name' => 'french', 'iso' => 'FR'],
      ];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // loop through langagues array

        foreach (LanguageFixtures::LANGUAGES as $lang) {
            $language = new Language();
            $language->setName($lang['name'])
                ->setIso($lang['iso']);
            $manager->persist($language);

            $languages[] = $language;

            if ($lang['iso'] === 'RU') {
              $this->addReference(self::LANG_RU_REFERENCE, $language);
            }
            if ($lang['iso'] === 'EN') {
              $this->addReference(self::LANG_EN_REFERENCE, $language);
            }
            if ($lang['iso'] === 'FR') {
              $this->addReference(self::LANG_FR_REFERENCE, $language);
            }

          }

          
          

        $manager->flush();
    }
}
