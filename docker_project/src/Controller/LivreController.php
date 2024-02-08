<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\LivreType;
use App\Repository\LivreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/livre')]
class LivreController extends AbstractController

{
    #[Route('/', name: 'app_livre', methods: ['GET'])]
    public function index(LivreRepository $livreRepository): Response
    {
        return $this->render('livre/index.html.twig', [
            'livres' => $livreRepository->findAll(),
        ]);
    }

    #[Route('/creer', name: 'app_livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
           
            $entityManager->persist($livre);
            $entityManager->flush();

            return $this->redirectToRoute('app_livre');
        }

        return $this->render('livre/creer.html.twig', [
            'livre' => $livre,
            'form' =>  $form = $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_livre_afficher', methods: ['GET'])]
    public function afficher(Livre $livre): Response
    {
        return $this->render('livre/afficher.html.twig', [
            'livre' => $livre,
        ]);
    }
}