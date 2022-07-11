<?php

namespace App\Controller\Admin;

use App\Entity\EtatsUsure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EtatsUsureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EtatsUsure::class;
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
