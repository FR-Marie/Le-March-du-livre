<?php

namespace App\Controller\Admin;

use App\Entity\Livres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class LivresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livres::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('genre_livre', 'Genre'),
            TextField::new('auteurLivre', 'Auteur(s) du livre'),
            TextField::new('titreLivre', 'Titre du livre'),

            ImageField::new('imageLivre')
                ->setBasePath('/img/Livres-en-ligne')
                ->setUploadDir('/public/img/Livres-en-ligne')
                ->setFormType(FileUploadType::class)
                ->setRequired(true),

            NumberField::new('prixlivre', 'Prix')
                ->setNumDecimals(2),

            AssociationField::new('vendeur_livre', 'Vendeur'),
            AssociationField::new('etat_livre', 'Etat d\'usure'),
            DateTimeField::new('dateAnnonceLivre', 'Date de l\'annonce')
        ];
    }

}
