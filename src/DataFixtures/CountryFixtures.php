<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CountryFixtures extends Fixture
{
    const LANGUAGES = ['RU', 'EN', 'FR'];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::LANGUAGES as $lang) {
            $country = new Country();
            $country->setIso($lang);
            $manager->persist($country);
        }

        $manager->flush();
    }
}
