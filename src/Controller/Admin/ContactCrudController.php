<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom'),
            TextField::new('fullname', 'Propriétaire'),
            TextField::new('email'),
            TextareaField::new('description', 'Description')
                ->hideOnIndex(),
            ImageField::new('illustration')
                ->setBasePath('uploads/contact/')
                ->setUploadDir('public/uploads/contact/')
                ->setUploadedFileNamePattern('[name]-[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('website', 'Site web'),
            TextField::new('phone', 'Téléphone'),
        ];
    }
}
