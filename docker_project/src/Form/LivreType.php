<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'required' => true,
            'attr' => [
                'placeholder' => 'Nom du livre'
            ]
        ])
        ->add('auteur', TextType::class, [
            'label' => 'Auteur',
            'required' => true,
        ])
        ->add('nombreDePage', TextType::class, [
            'label' => 'Nombre de page',
            'required' => true,
            'attr' => [
                'placeholder' => 'Nombre de page'
            ]
            
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}