<?php

namespace App\Controller\Admin;

use App\Entity\ArticleCaroussel;
use App\Entity\Horaire;
use App\Entity\Met;
use App\Entity\Partenaire;
use App\Entity\Vin;
use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(ArticleCarousselCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant Des Plantes');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'app_homepage');
        yield MenuItem::section('Admin', 'fa fa-gear');
        yield MenuItem::linkToCrud('Article du Caroussel', 'fas fa-newspaper',  ArticleCaroussel::class);
        yield MenuItem::linkToCrud('Etiquette de vin', 'fas fa-wine-bottle',  Vin::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock',  Horaire::class);
        yield MenuItem::linkToCrud('Cours', 'fas fa-pen',  Cours::class);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-edit',  Partenaire::class);
        yield MenuItem::linkToCrud('Entrées', 'fas fa-utensils', Met::class)
                ->setController(EntreeCrudController::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-utensils', Met::class)
                ->setController(PlatCrudController::class);
        yield MenuItem::linkToCrud('Fromages', 'fas fa-utensils', Met::class)
                ->setController(FromageCrudController::class);
        yield MenuItem::linkToCrud('Desserts', 'fas fa-utensils', Met::class)
                ->setController(DessetCrudController::class);
    }
}
