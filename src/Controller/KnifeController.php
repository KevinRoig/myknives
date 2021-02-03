<?php

namespace App\Controller;

use App\Entity\Knife;
use App\Entity\User;
use App\Form\KnifeType;
use App\Repository\KnifeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/knife")
 */
class KnifeController extends AbstractController
{
    /**
     * @Route("/", name="knife_index", methods={"GET"})
     */
    public function index(KnifeRepository $knifeRepository): Response
    {
        return $this->render('knife/index.html.twig', [
            'knives' => $knifeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="knife_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $knife = new Knife();
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $form = $this->createForm(KnifeType::class, $knife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $knife->setUser($user);
            $entityManager->persist($knife);
            $entityManager->flush();

            return $this->redirectToRoute('knife_index');
        }

        return $this->render('knife/new.html.twig', [
            'knife' => $knife,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="knife_show", methods={"GET"})
     */
    public function show(Knife $knife): Response
    {
        return $this->render('knife/show.html.twig', [
            'knife' => $knife,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="knife_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Knife $knife): Response
    {
        $form = $this->createForm(KnifeType::class, $knife);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('knife_index');
        }

        return $this->render('knife/edit.html.twig', [
            'knife' => $knife,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="knife_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Knife $knife): Response
    {
        if ($this->isCsrfTokenValid('delete'.$knife->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($knife);
            $entityManager->flush();
        }

        return $this->redirectToRoute('knife_index');
    }
}
