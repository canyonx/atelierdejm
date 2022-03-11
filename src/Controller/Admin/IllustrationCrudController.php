<?php

namespace App\Controller\Admin;

use App\Entity\Illustration;
use App\Controller\Admin\Fields\MultipleImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IllustrationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Illustration::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add('product');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ->disable('edit')
            // ->disable('delete')
            ->disable('new');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('product'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/images')
                ->setBasePath('uploads/images')
                ->setRequired(false)
                ->hideOnForm(),
            // MultipleImageField::new('imageFile')
            //     ->setRequired(false)
            //     ->onlyOnForms(),
        ];
    }
}
