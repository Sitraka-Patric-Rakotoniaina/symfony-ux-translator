<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/{locale?en}', name: 'home_index', requirements: ['locale' => 'en|fr'])]
    public function index(TranslatorInterface $translator, LocaleSwitcher $switcher, string $locale): Response
    {
        $switcher->setLocale($locale);
        return $this->render('home/index.html.twig');
    }
}
