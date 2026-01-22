<?php

namespace App\DataFixtures;

use App\Entity\ArticleCaroussel;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Horaire;
use App\Entity\User;
use App\Entity\Vin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $article1 = new ArticleCaroussel('restau_1.jpg','Notre restaurant (ré) ouvre ses portes',"Le restaurant de plantes réouvre après rénovation, avec de nouveaux plats végétariens délicieux à déguster dès maintenant. Venez découvrir nos nouveautés et profiter de l'ambiance renouvelée dans notre établissement accueillant et chaleureux.");

        $manager->persist($article1);


        $vin1 =  new Vin('vin1.png','Saint-Nicolas de Bourgueil - Sauvignon','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.');
        $vin2 =  new Vin('vin1.png','Saint-Nicolas de Bourgueil - Sauvignon','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.');
        $vin3 =  new Vin('vin1.png','Saint-Nicolas de Bourgueil - Sauvignon','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.','Lorem ipsum dolor sit amet consectetur. Erat risus ornare non sed aliquam porta. Donec semper sagittis id habitant viverra duis.');

        $manager->persist($vin1);
        $manager->persist($vin2);
        $manager->persist($vin3);

        $jour1 =  new Horaire('Lundi','12H00 - 14H00','Fermé');
        $jour2 =  new Horaire('Mardi','12H00 - 14H00','Fermé');
        $jour3 =  new Horaire('Jeudi','12H00 - 14H00','19H30 - 21H00');
        $jour4 =  new Horaire('Vendredi','12H00 - 14H00','19H30 - 21H00');
        $jour5 =  new Horaire('Samedi','12H00 - 14H00','19H30 - 21H00');
        $jour6 =  new Horaire('Dimanche','12H00 - 14H00','Fermé');


        $manager->persist($jour1);
        $manager->persist($jour2);
        $manager->persist($jour3);
        $manager->persist($jour4);
        $manager->persist($jour5);
        $manager->persist($jour6);

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordHasher->hashPassword($admin, 'password'));
        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $manager->persist($user);


        $manager->flush();
    }
}
