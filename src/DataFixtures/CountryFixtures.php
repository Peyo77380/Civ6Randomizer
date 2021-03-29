<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CountryFixtures extends Fixture
{
    const COUNTRIES = ['RUS', 'GBR', 'FRA'];

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::COUNTRIES as $lang) {
            $country = new Country();
            $country->setIso($lang); 
            $manager->persist($country);
        }

        $manager->flush();
    }
}
