<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Conference;
use App\Entity\Person;
use App\Entity\Slot;
use App\Entity\Speaker;
use App\Entity\Talk;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Fabric Conference');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Go to site', 'fa fa-arrow-alt-circle-right', 'app_home');
        yield MenuItem::section('Menu');
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Schedule', 'fas fa-clock', Slot::class);
        yield MenuItem::linkToCrud('Conferences', 'fa fa-calendar-day', Conference::class);
        yield MenuItem::linkToCrud('Talks', 'fa fa-chalkboard-teacher', Talk::class);
        yield MenuItem::linkToCrud('People', 'fa fa-users', Person::class);
        yield MenuItem::linkToCrud('Admins', 'fa fa-users-cog', Admin::class);
    }
}
