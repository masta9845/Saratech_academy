<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $faker;

    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->faker = Factory::create('fr_FR');
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $num = 2279845687;
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 10; $i++) {
            $user = new Utilisateur();

            $user->setNom($this->faker->name())
                ->setPrenom($this->faker->firstName())
                ->setNumero("+" . $num . $i)
                ->setEmail($this->faker->email())
                ->setEtablissement($this->faker->text())
                ->setRoles(['ROLE_USER'])
                ->setNiveauetude($this->faker->text());
                $hashPasswprd = $this->hasher->hashPassword(
                    $user,
                    123456
                );
                $user->setPassword($hashPasswprd);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
