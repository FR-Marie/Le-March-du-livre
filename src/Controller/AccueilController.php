<?php

namespace App\Controller;

use App\Repository\LivresRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     * @param LivresRepository $livresRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function livresAccueilPagines(LivresRepository $livresRepository, PaginatorInterface $paginator, Request $request): Response
    {

        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        //$donnees = $this->getDoctrine()->getRepository(Articles::class)->findBy([],['created_at' => 'desc']);
        //Si tri utilisé, supprimer le ->finAll() et appeler $donnees à la place

        $pagination = $paginator->paginate(
            $livresRepository->findAll(),
            $request->query->getInt('page', 1), 3
        );

        return $this->render('accueil/accueil.html.twig', [
            'titreSite' => 'Le Marché Du Livre',
            'livresPaginesAccueil' => $pagination
        ]);
    }
}
