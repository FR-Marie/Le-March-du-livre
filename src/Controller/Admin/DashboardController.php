<?php

namespace App\Controller\Admin;

use App\Entity\EtatsUsure;
use App\Entity\Formats;
use App\Entity\Genres;
use App\Entity\Livres;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $urlBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($urlBuilder->setController(LivresCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ADMINISTRATION <br> "Le Marché du Livre"');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

            MenuItem::section('LIVRES'),
            MenuItem::linkToCrud('Tous les livres', 'fas fa-book', Livres::class),

            MenuItem::section('GESTION DES'),
            MenuItem::linkToCrud('Genres', 'fab fa-galactic-senate', Genres::class),
            MenuItem::linkToCrud('Formats', 'fab fa-stack-overflow', Formats::class),
            MenuItem::linkToCrud('EtatsUsure', 'fab fa-stack-overflow', EtatsUsure::class),


            MenuItem::section('GESTION UTILISATEURS'),
            MenuItem::linkToCrud('Tous les utilisateurs', 'fas fa-users', User::class),

            MenuItem::section('VOIR LE SITE'),
            MenuItem::linkToRoute('J\'y vais!', 'fa fa-door-open', 'app_accueil')
        ];

    }
}
