<?php

namespace App\DataFixtures;

use App\Entity\Administrator;
use App\Entity\Customer;
use App\Entity\Product;
use App\Entity\Shopper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // Appelle de la librairie Faker
        $faker=\Faker\Factory::create('fr_FR');
        // on créé 18 Figures
        for ($i = 0; $i < 18; $i++) {
            // création des administrateurs
            $admin = new Administrator();
            $admin->setEmail($faker->email);
            $admin->setUsername($faker->sentence(5));
            $admin->setPassword($faker->password(6, 6));
            $admin->setCreatdat($faker->dateTime());
            $admin->setUpddat($faker->dateTime());


            for ($k = 1; $k <= rand(2, 6); $k++) {
                // création d'une produit
                $product= new Product();
                $product->setName($faker->text(10));
                $product->setSeries($faker->text(10));
                $product->setNumseries($faker->text(10));
                $product->setDescription($faker->text(150));
                $product->setPictureurl($faker->imageUrl());
                $product->setQuantity($faker->randomNumber());
                $product->setPrice($faker->randomFloat());
                $product->setCreatdat($faker->dateTime());
                $product->setUpddat($faker->dateTime());
                $product->setAdministrators($admin);
                $manager->persist($product);

            }
            $manager->persist($admin);


            // création des clients
            $customer = new Customer();
            $customer->setEmail($faker->email);
            $customer->setUsername($faker->sentence(5));
            $customer->setPassword($faker->password(6, 6));
            $customer->setCreatdat($faker->dateTime());
            $customer->setUpddat($faker->dateTime());
            $customer->setContact($faker->randomNumber());


            for ($l = 1; $l <= rand(2, 6); $l++) {
                // création d'un achetteur
                $shopper= new Shopper();
                $shopper->setFirstname($faker->firstName);
                $shopper->setLastname($faker->lastName);
                $shopper->setEmail($faker->email);
                $shopper->setContact($faker->randomNumber());
                $shopper->setCreatdat($faker->dateTime());
                $shopper->setUpddat($faker->dateTime());
                $shopper->setCustomers($customer);

                $manager->persist($shopper);

            }









            $manager->persist($customer);

        }






        $manager->flush();
    }
}
