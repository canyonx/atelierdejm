<?php

namespace App\Controller\Admin;

use App\Entity\Term;
use App\Entity\User;
use App\Entity\Legal;
use App\Entity\Header;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\Featurette;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ProductCrudController;
use App\Entity\Gallery;
use App\Entity\Illustration;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(ProductCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Reparations');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Products', 'fas fa-tag', Product::class);
        yield MenuItem::linkToCrud('Illustrations', 'fa fa-camera', Illustration::class);
        // yield MenuItem::linkToCrud('Products', 'fas fa-tag', Product::class);
        yield MenuItem::linkToCrud('Headers', 'fas fa-images', Header::class);
        yield MenuItem::linkToCrud('Featurettes', 'fas fa-list', Featurette::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-address-book', Contact::class);
        // yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('CGV', 'fa fa-file-contract', Term::class);
        yield MenuItem::linkToCrud('Mentions légales', 'fa fa-ellipsis-h', Legal::class);
    }
}
