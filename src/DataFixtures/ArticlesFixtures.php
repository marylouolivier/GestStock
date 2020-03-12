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
        
        //Création de fournisseurs (entre 1 et 5)
        for($i=0; $i < mt_rand(1, 5); $i++) {
            $fournisseur = new Fournisseurs();
            $fournisseur->setNomFour($faker->lastName);
            $fournisseur->setSiteWebFour($faker->url);

            $manager->persist($fournisseur);

            //Création d'articles pour chaque fournisseur (entre 1 et 5)
            for($j=0; $j < 3; $j++) {
                $article = new Articles();
                $article->setNomArt($faker->word);
                $article->setQtArt($faker->randomDigit);

                $fournisseur->addArticle($article);
                $manager->persist($article);

                //Création d'entrées pour chaque article
                for($k=0; $k < 1; $k++) {
                    $entree = new Entrees();
                    $entree->setQtEntree($faker->randomDigit);

                    $article->addEntree($entree);
                    $manager->persist($entree);
                
                //Création de sorties pour chaque articles
                for($l=0; $l < 1; $l++) {
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
