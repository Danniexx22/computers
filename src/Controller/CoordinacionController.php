<?php

namespace App\Controller;

use App\Entity\Coordinacion;
use App\Form\CoordinacionType;
use App\Repository\CoordinacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coordinacion")
 */
class CoordinacionController extends Controller
{
    /**
     * @Route("/", name="coordinacion_index", methods="GET")
     */
    public function index(CoordinacionRepository $coordinacionRepository): Response
    {
        return $this->render('coordinacion/index.html.twig', ['coordinacions' => $coordinacionRepository->findAll()]);
    }

    /**
     * @Route("/new", name="coordinacion_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $coordinacion = new Coordinacion();
        $form = $this->createForm(CoordinacionType::class, $coordinacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coordinacion);
            $em->flush();

            return $this->redirectToRoute('coordinacion_index');
        }

        return $this->render('coordinacion/new.html.twig', [
            'coordinacion' => $coordinacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coordinacion_show", methods="GET")
     */
    public function show(Coordinacion $coordinacion): Response
    {
        return $this->render('coordinacion/show.html.twig', ['coordinacion' => $coordinacion]);
    }

    /**
     * @Route("/{id}/edit", name="coordinacion_edit", methods="GET|POST")
     */
    public function edit(Request $request, Coordinacion $coordinacion): Response
    {
        $form = $this->createForm(CoordinacionType::class, $coordinacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coordinacion_edit', ['id' => $coordinacion->getId()]);
        }

        return $this->render('coordinacion/edit.html.twig', [
            'coordinacion' => $coordinacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coordinacion_delete", methods="DELETE")
     */
    public function delete(Request $request, Coordinacion $coordinacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coordinacion->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coordinacion);
            $em->flush();
        }

        return $this->redirectToRoute('coordinacion_index');
    }
}
