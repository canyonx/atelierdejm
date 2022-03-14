<?php

namespace App\Controller\Admin;

use App\Entity\Illustration;
use App\Controller\Admin\ProductCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use App\Controller\Admin\Fields\MultipleImageField;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IllustrationCrudController extends AbstractCrudController
{

    protected $cacheManager;
    protected $adminUrlGenerator;
    protected $em;

    public function __construct(
        CacheManager $cacheManager,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $entityManager
    ) {
        $this->cacheManager = $cacheManager;
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->em = $entityManager;
    }

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

    /**
     * Fonction de suppression d'une image 
     * depuis l'entité product de easy admin 
     * via template admin 
     */
    public function delete(AdminContext $context)
    {
        // Récupère l'entité image
        $image = $context->getEntity()->getInstance();

        $imagePath = 'uploads/images/' . $image->getImage();

        // Suppression cache liipImagine
        $this->cacheManager->remove($imagePath);

        // Suppression original
        @unlink($imagePath);

        // Suppression bdd
        $this->em->remove($image);
        $this->em->flush();

        // création de l'url de retour après la suppression
        $url = $this->adminUrlGenerator
            ->setController(ProductCrudController::class)
            ->setAction(Crud::PAGE_DETAIL)
            ->setEntityId($image->getProduct()->getId());

        return $this->redirect($url->generateUrl());
    }
}
