<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Articles;
use App\Entity\Entrees;
use App\Entity\Fournisseurs;
use App\Entity\Sorties;
use Faker;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Instanciation de la classe Faker
        //On peut utiliser la langue française en mettant create('fr_FR)
        $faker = Faker\Factory::create();

        for($i=0; $i < 10; $i++) {
            $fournisseur = new Fournisseurs();
            $fournisseur->setNomFour($faker->lastName);
            $fournisseur->setSiteWebFour($faker->url);

            $manager->persist($fournisseur);

            for($j=0; $j < mt_rand(1,20); $j++) {
                $article = new Articles();
                $article->setNomArt($faker->word);
                $article->setQtArt($faker->randomDigit);

                $fournisseur->addArticle($article);
                $manager->persist($article);

                for($k=0; $k < mt_rand(1,20); $k++) {
                    $entree = new Entrees();
                    $entree->setQtEntree($faker->randomDigit);

                    $article->addEntree($entree);
                    $manager->persist($entree);

                for($l=0; $l < mt_rand(1,20); $l++) {
                    $sortie = new Sorties();
                    $sortie->setQtSortie($faker->randomDigit);

                    $article->addSorty($sortie);
                    $manager->persist($sortie);
                }

                }
            }
        }
        $manager->flush();
    }
}
