<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;
use Doctrine\Persistence\ObjectManager;
use Generator;

class AppFixtures extends Fixture
{
    /**
     * création des faker
     * 
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    /**
     * création de la fonction fixture
     * avec boucle for
     * 
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 50; $i++) {

            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(0, 100));

            $manager->persist($ingredient);
        }

        $manager->flush();
    }
}
