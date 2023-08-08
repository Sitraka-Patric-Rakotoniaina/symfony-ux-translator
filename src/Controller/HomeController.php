<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Process\Process;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    #[Route('/{locale?en}', name: 'home_index', requirements: ['locale' => 'en|fr'])]
    public function index(LocaleSwitcher $switcher, string $locale): Response
    {
        $users = $this->userRepository->findAll();
        $switcher->setLocale($locale);
        return $this->render('home/index.html.twig', ['users' => $users]);
    }

    #[Route('/create_file/{locale?en}', name: 'create_file', requirements: ['locale' => 'en|fr'])]
    public function createFIle(LocaleSwitcher $switcher, string $locale): Response
    {
        $switcher->setLocale($locale);
        $process = new Process(['sh', realpath(__DIR__ . '/../../script/test.sh')]);
        $process->run();
        if ($process->isSuccessful()) {
            dd($process->getOutput());
        } else {
            dd('error' . $process->getErrorOutput());
        }
        return $this->redirectToRoute('home_index', ['locale' => $locale]);
    }
}
