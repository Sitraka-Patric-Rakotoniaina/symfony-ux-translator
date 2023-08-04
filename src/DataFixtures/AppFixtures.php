<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private const DEFAULT_PASSWORD = "123456";

    public function __construct(private readonly  UserPasswordHasherInterface $hasher) {}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setCity($faker->city())
                ->setLastname($faker->lastname())
                ->setFirstname($faker->firstname())
                ->setPassword($this->hasher->hashPassword($user, self::DEFAULT_PASSWORD));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
