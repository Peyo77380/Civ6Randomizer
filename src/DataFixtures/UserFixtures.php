<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Siricks');
        $user->setPassword('$2y$13$.swN8t0O.zQo3jJ9VTYIxeX9ALXIB6CT/4tand1jJKUckNmp9BBke');
        $user->setLocale('ru');
        $manager->persist($user);

        $user2 = new User();
        $user2->setUsername('Peyo');
        $user2->setPassword('$2y$13$FbIayaczYNJ5o.86VewU3uJ1l..wfDpOuZ.uFD6Y2qhw5IJ0W5Gea');
        $user2->setLocale('fr');
        $manager->persist($user2);
        $manager->flush();


    }
}
