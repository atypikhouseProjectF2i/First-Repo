<?php

namespace App\DataFixtures;

use App\Entity\Accommodation;
use App\Entity\Activity;
use App\Entity\Equipement;
use App\Entity\Service;
use App\Entity\TypeAccommodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // creation de 3 USERS
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
        // creation d'equipements
        $equipment_tab = ["wifi", "TV", "piscine", "lave linge", "sèche linge", "barbecue"];
        for ($i = 0; $i < count($equipment_tab); $i++) {
            $equipment = new Equipement();
            $equipment->setName($equipment_tab[$i]);
            $manager->persist($equipment);
        }
        // creation d'activités
        $activity_tab = ["randonnées", "karting", "quad", "parapente", "motocross", "musées"];
        for ($i = 0; $i < count($activity_tab); $i++) {
            $activity = new Activity();
            $activity->setName($activity_tab[$i]);
            $manager->persist($activity);
        }
        // creation de services
        $service_tab = ["petit-déjeuner", "ménage"];
        for ($i = 0; $i < count($service_tab); $i++) {
            $service = new Service();
            $service->setName($service_tab[$i]);
            $manager->persist($service);
        }
        // creation de type d'hébergements
        $type_accommodation_tab = ["cabane", "tente", "roulotte", "bulle", "dôme", "yourte", "tipi", "nid"];
        for ($i = 0; $i < count($type_accommodation_tab); $i++) {
            $type_accommodation = new TypeAccommodation();
            $type_accommodation->setName($type_accommodation_tab[$i]);
            $manager->persist($type_accommodation);
        }
        $manager->flush();
    }
}
