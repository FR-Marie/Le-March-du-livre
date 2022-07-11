<?php

namespace App\Form;

use App\Entity\EtatsUsure;
use App\Entity\Formats;
use App\Entity\Genres;
use App\Entity\Livres;
use App\Entity\User;

use Symfony\Component\Form\AbstractType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class LivresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder

            ->add('genre_livre', EntityType::class, [
                'class' => Genres::class,
                'choice_label' => 'genre',
                'label' => 'Genre',
                'required' => true
            ])


            ->add('auteur_livre', TextType::class, [
                'required' => true
            ])


            ->add('titre_livre', TextType::class, [
                'required' => true
            ])


            ->add('image_livre', FileType::class, [
                'label' => 'Image du livre',
                'required' => true,
                'data_class' => null,
                'empty_data' => 'Aucune image pour ce livre!'
            ])


            ->add('format_livre', EntityType::class, [
                'class' => Formats::class,
                'choice_label' => 'format',
                'label' => 'Sélectionnez un format',
                'required' => true,

            ])


            ->add('vendeur_livre', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'label' => 'Vendu par',
                'required' => true
            ])


            ->add('etat_livre', EntityType::class, [
                'class' => EtatsUsure::class,
                'choice_label' => 'Etat',
                'label' => 'Sélectionnez l\'état d\'usure du livre',
            ])


            ->add('prix_livre', NumberType::class, [
                'required' => true
            ])


            ->add('date_annonce_livre', DateType::class, [
                'required' => true
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livres::class,
        ]);
    }
}
