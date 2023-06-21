<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Wish;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',
            null,
            [
                'label' => "Titre",
                'required' => false,
                'attr' => [
                    'placeholder' => "Saisir le titre du souhait"
                ]
            ])
            ->add('description',
               null,
            [
                'label' => "Description",
                'required' => true,
                'attr' => [
                    'placeholder' => "Saisir la description du souhait"
                ]
            ])
            ->add('author',
                null,
                [
                    'data'=> $options['user'],
                    'label' => "Auteur",
                    'required' => true,
                    'attr' => [
                        'placeholder' => "Saisir l'auteur du souhait"
                    ]
                ])
            ->add('category',
                EntityType::class,
                [
                    'class'=> Category::class,
                    'choice_label' => 'name',
                    'label' => 'Categorie',
                    'multiple' => false,
                    'required' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
            'user' => null,
        ]);
    }
}
