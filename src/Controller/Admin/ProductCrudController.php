<?php

namespace App\Controller\Admin;

use App\Entity\Gallery;
use App\Entity\Product;
use App\Entity\Illustration;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use App\Controller\Admin\Fields\MultipleImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('isBest', 'Mis en avant'),
            //ArrayField::new('illustrations'),
            ArrayField::new('illustrations')
                ->setTemplatePath('admin/imageCrud.html.twig')
                ->onlyOnDetail(),
            //AssociationField::new('illustrations'),

            TextField::new('name', 'Nom'),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->hideOnIndex(),
            TextField::new('subtitle', 'Sous-titre'),
            TextEditorField::new('description', 'Description'),

            // ImageField::new('illustration')
            //     ->setUploadDir('public/uploads/images/')
            //     ->setBasePath('uploads/images/')
            //     ->setRequired(false)
            //     ->onlyOnDetail(),

            MultipleImageField::new('imageFile', 'Images')
                ->onlyOnForms(),

            TextField::new('price', 'Prix')
        ];
    }


    /**
     * @param EntityManagerInterface $em
     * @param Product $product
     */
    public function persistEntity(
        EntityManagerInterface $em,
        $product
    ): void {

        if ($product->getImageFile()) {
            foreach ($product->getImageFile() as $file) {
                $illustration = new Illustration();

                $illustration
                    ->setProduct($product)
                    ->setImage($file->getClientOriginalName())
                    ->upload($file);

                $em->persist($illustration);
            }
        }
        $em->persist($product);
        $em->flush();
    }

    /**
     * @param EntityManagerInterface $em
     * @param Product $product
     */
    public function updateEntity(
        EntityManagerInterface $em,
        $product
    ): void {

        if ($product->getImageFile()) {
            foreach ($product->getImageFile() as $file) {
                $illustration = new Illustration();

                $illustration
                    ->setProduct($product)
                    ->setImage($file->getClientOriginalName())
                    ->upload($file);

                $em->persist($illustration);
            }
        }
        $em->persist($product);
        $em->flush();
    }
}
