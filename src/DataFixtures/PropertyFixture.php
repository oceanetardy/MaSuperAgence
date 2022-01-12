<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Property;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++){
            $property = new Property();
            $property
                ->setTitle('Mon super bien' .$i)
                ->setDescription('Ma dscription du bien' .$i)
                ->setSurface('45' .$i)
                ->setRooms('2' .$i)
                ->setBedrooms('2' .$i)
                ->setFloor('5' .$i)
                ->setPrice('210000' .$i)
                ->setHeat('1' .$i)
                ->setCity('Montpellier' .$i)
                ->setAddress('2 Chemin test' .$i)
                ->setPostalCode('34000' .$i)
                ->setSold(false);
            $manager->persist($property);
        }
        $manager->flush();
    }
}
