<?php

namespace App\Controller;

use App\Entity\Nor2;
use App\Form\Nor2Type;
use App\Repository\Nor2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nor2")
 */
class Nor2Controller extends Controller
{
    /**
     * @Route("/", name="nor2_index", methods="GET")
     */
    public function index(Nor2Repository $nor2Repository): Response
    {
        return $this->render('nor2/index.html.twig', ['nor2s' => $nor2Repository->findAll()]);
    }

    /**
     * @Route("/new", name="nor2_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $nor2 = new Nor2();
        $form = $this->createForm(Nor2Type::class, $nor2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nor2);
            $em->flush();

            return $this->redirectToRoute('nor2_index');
        }

        return $this->render('nor2/new.html.twig', [
            'nor2' => $nor2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nor2_show", methods="GET")
     */
    public function show(Nor2 $nor2): Response
    {
        return $this->render('nor2/show.html.twig', ['nor2' => $nor2]);
    }

    /**
     * @Route("/{id}/edit", name="nor2_edit", methods="GET|POST")
     */
    public function edit(Request $request, Nor2 $nor2): Response
    {
        $form = $this->createForm(Nor2Type::class, $nor2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nor2_edit', ['id' => $nor2->getId()]);
        }

        return $this->render('nor2/edit.html.twig', [
            'nor2' => $nor2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nor2_delete", methods="DELETE")
     */
    public function delete(Request $request, Nor2 $nor2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nor2->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nor2);
            $em->flush();
        }

        return $this->redirectToRoute('nor2_index');
    }
}
