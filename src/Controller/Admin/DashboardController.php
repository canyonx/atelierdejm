<?php

namespace App\Controller\Admin;

use App\Entity\Term;
use App\Entity\User;
use App\Entity\Legal;
use App\Entity\Header;
use App\Entity\Contact;
use App\Entity\Gallery;
use App\Entity\Product;
use App\Entity\Setting;
use App\Entity\Featurette;
use App\Entity\Illustration;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ProductCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    protected $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->adminUrlGenerator;

        return $this->redirect($routeBuilder->setController(ProductCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Atelier de JM');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Products', 'fas fa-tag', Product::class);
        // yield MenuItem::linkToCrud('Illustrations', 'fa fa-camera', Illustration::class);
        // yield MenuItem::linkToCrud('Products', 'fas fa-tag', Product::class);
        yield MenuItem::linkToCrud('Headers', 'fas fa-images', Header::class);
        yield MenuItem::linkToCrud('Featurettes', 'fas fa-list', Featurette::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-address-book', Contact::class);
        // yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('CGV', 'fa fa-file-contract', Term::class);
        yield MenuItem::linkToCrud('Mentions légales', 'fa fa-ellipsis-h', Legal::class);
        // Configuration
        yield MenuItem::linkToCrud('Configuration', 'fas fa-cog', Setting::class)
            ->setQueryParameter('crudAction', 'detail')
            ->setQueryParameter('entityId', '1');
    }
}
