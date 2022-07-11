<?php

namespace App\Controller;

use App\Entity\Livres;
use App\Form\LivresType;
use App\Repository\LivresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livres")
 */
class LivresController extends AbstractController
{
    /**
     * @Route("/", name="app_livres_index", methods={"GET"})
     */
    public function index(LivresRepository $livresRepository): Response
    {
        return $this->render('livres/index.html.twig', [
            'livres' => $livresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_livres_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LivresRepository $livresRepository): Response
    {
        $livre = new Livres();
        $form = $this->createForm(LivresType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form["image_livre"]->getData();

            if (!is_string($file)) {
                $fileName = $file->getClientOriginalName();

                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );


                $livre->setImageLivre($fileName);


                //$this->addFlash('success', 'Le livre a bien été ajouté');

            } else {
                //$this->addFlash('danger', 'Une erreur est survenue');
                return $this->redirect($this->generateUrl('app_livres_new'));

            }

            $livresRepository->add($livre, true);
            return $this->redirectToRoute('app_livres_index', [], Response::HTTP_SEE_OTHER);

        }
        return $this->renderForm('livres/new.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_livres_show", methods={"GET"})
     */
    public function show(Livres $livre): Response
    {
        return $this->render('livres/show.html.twig', [
            'livre' => $livre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_livres_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Livres $livre, LivresRepository $livresRepository): Response
    {

        $img = $livre->getImageLivre();

        $form = $this->createForm(LivresType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form["image_livre"]->getData();

            if (!is_string($file)) {
                $fileName = $file->getClientOriginalName();

                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );


                $livre->setImageLivre($fileName);


                //$this->addFlash('success', 'Le livre a bien été ajouté');

            } else {
                //$this->addFlash('danger', 'Une erreur est survenue');
                $livre->setImageLivre($img);

            }

            $livresRepository->add($livre, true);

            return $this->redirectToRoute('app_livres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livres/edit.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_livres_delete", methods={"POST"})
     */
    public function delete(Request $request, Livres $livre, LivresRepository $livresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livre->getId(), $request->request->get('_token'))) {
            $livresRepository->remove($livre, true);
        }

        return $this->redirectToRoute('app_livres_index', [], Response::HTTP_SEE_OTHER);
    }
}
