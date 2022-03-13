<?php

namespace App\Controller\Admin;

use App\Entity\Header;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Header::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isShow', 'Afficher'),
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Description')
                ->hideOnIndex(),
            ImageField::new('illustration')
                ->setBasePath('uploads/header/')
                ->setUploadDir('public/uploads/header/')
                ->setUploadedFileNamePattern('[name]-[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('btnTitle', 'Bouton'),
            TextField::new('btnUrl', 'Lien'),
        ];
    }
}
