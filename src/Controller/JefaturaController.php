<?php

namespace App\Controller;

use App\Entity\Jefatura;
use App\Form\JefaturaType;
use App\Repository\JefaturaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jefatura")
 */
class JefaturaController extends Controller
{
    /**
     * @Route("/", name="jefatura_index", methods="GET")
     */
    public function index(JefaturaRepository $jefaturaRepository): Response
    {
        return $this->render('jefatura/index.html.twig', ['jefaturas' => $jefaturaRepository->findAll()]);
    }

    /**
     * @Route("/new", name="jefatura_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $jefatura = new Jefatura();
        $form = $this->createForm(JefaturaType::class, $jefatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jefatura);
            $em->flush();

            return $this->redirectToRoute('jefatura_index');
        }

        return $this->render('jefatura/new.html.twig', [
            'jefatura' => $jefatura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jefatura_show", methods="GET")
     */
    public function show(Jefatura $jefatura): Response
    {
        return $this->render('jefatura/show.html.twig', ['jefatura' => $jefatura]);
    }

    /**
     * @Route("/{id}/edit", name="jefatura_edit", methods="GET|POST")
     */
    public function edit(Request $request, Jefatura $jefatura): Response
    {
        $form = $this->createForm(JefaturaType::class, $jefatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jefatura_edit', ['id' => $jefatura->getId()]);
        }

        return $this->render('jefatura/edit.html.twig', [
            'jefatura' => $jefatura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="jefatura_delete", methods="DELETE")
     */
    public function delete(Request $request, Jefatura $jefatura): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jefatura->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jefatura);
            $em->flush();
        }

        return $this->redirectToRoute('jefatura_index');
    }
}
