<?php

namespace App\Controller;

use App\Entity\Nor1;
use App\Form\Nor1Type;
use App\Repository\Nor1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nor1")
 */
class Nor1Controller extends Controller
{
    /**
     * @Route("/", name="nor1_index", methods="GET")
     */
    public function index(Nor1Repository $nor1Repository): Response
    {
        return $this->render('nor1/index.html.twig', ['nor1s' => $nor1Repository->findAll()]);
    }

    /**
     * @Route("/new", name="nor1_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $nor1 = new Nor1();
        $form = $this->createForm(Nor1Type::class, $nor1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nor1);
            $em->flush();

            return $this->redirectToRoute('nor1_index');
        }

        return $this->render('nor1/new.html.twig', [
            'nor1' => $nor1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nor1_show", methods="GET")
     */
    public function show(Nor1 $nor1): Response
    {
        return $this->render('nor1/show.html.twig', ['nor1' => $nor1]);
    }

    /**
     * @Route("/{id}/edit", name="nor1_edit", methods="GET|POST")
     */
    public function edit(Request $request, Nor1 $nor1): Response
    {
        $form = $this->createForm(Nor1Type::class, $nor1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nor1_edit', ['id' => $nor1->getId()]);
        }

        return $this->render('nor1/edit.html.twig', [
            'nor1' => $nor1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nor1_delete", methods="DELETE")
     */
    public function delete(Request $request, Nor1 $nor1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nor1->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nor1);
            $em->flush();
        }

        return $this->redirectToRoute('nor1_index');
    }
}
