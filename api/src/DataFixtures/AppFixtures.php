<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // creation de 3 users
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@gmail.com');
            $user->setName('username' . $i);
            $user->setFirstname('userfirstname' . $i);
            $user->setNewsletter(true);
            $user->setPassword('mypassword');
            $user->setPhone('06242545649' . $i);
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
