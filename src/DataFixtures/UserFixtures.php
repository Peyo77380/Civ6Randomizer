<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Siricks');
        $user->setPassword('$2y$13$/x3VBgCG13/wN7cZZvuKIeF/heIcSCSnfDNpvd4tUzwRQ6Unmtn/i');//1234
        $user->setLocale('ru');
        $manager->persist($user);
        $manager->flush();
    }
}
