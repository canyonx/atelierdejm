<?php

namespace App\Controller\Admin;

use App\Entity\Featurette;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FeaturetteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Featurette::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isShow', 'Afficher'),
            TextField::new('title', 'Titre'),
            TextareaField::new('description', 'Description')
                ->hideOnIndex(),
            ImageField::new('illustration')
                ->setBasePath('uploads/featurette/')
                ->setUploadDir('public/uploads/featurette/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }
}
