<?php

namespace App\Form;

use App\Entity\Fournisseurs;
use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomArt', null, [
                'attr' => [
                    'placeholder' => 'Nom article'
                ]
            ])
            ->add('QtArt', null, [
                'attr' => [
                    'placeholder' => 'Quantité article'
                ]
            ])
            ->add('Fournisseur', EntityType::class, [
                'class' => Fournisseurs::class,
                'choice_label' => 'NomFour'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
