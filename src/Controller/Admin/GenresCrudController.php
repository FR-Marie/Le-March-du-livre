<?php

namespace App\Controller\Admin;

use App\Entity\Genres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GenresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Genres::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
