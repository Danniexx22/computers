<?php

namespace App\Controller;

use App\Entity\Norm;
use App\Form\NormType;
use App\Repository\NormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/norm")
 */
class NormController extends Controller
{
    /**
     * @Route("/", name="norm_index", methods="GET")
     */
    public function index(NormRepository $normRepository): Response
    {
        return $this->render('norm/index.html.twig', ['norms' => $normRepository->findAll()]);
    }

    /**
     * @Route("/new", name="norm_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $norm = new Norm();
        $form = $this->createForm(NormType::class, $norm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($norm);
            $em->flush();

            return $this->redirectToRoute('norm_index');
        }

        return $this->render('norm/new.html.twig', [
            'norm' => $norm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="norm_show", methods="GET")
     */
    public function show(Norm $norm): Response
    {
        return $this->render('norm/show.html.twig', ['norm' => $norm]);
    }

    /**
     * @Route("/{id}/edit", name="norm_edit", methods="GET|POST")
     */
    public function edit(Request $request, Norm $norm): Response
    {
        $form = $this->createForm(NormType::class, $norm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('norm_edit', ['id' => $norm->getId()]);
        }

        return $this->render('norm/edit.html.twig', [
            'norm' => $norm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="norm_delete", methods="DELETE")
     */
    public function delete(Request $request, Norm $norm): Response
    {
        if ($this->isCsrfTokenValid('delete'.$norm->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($norm);
            $em->flush();
        }

        return $this->redirectToRoute('norm_index');
    }
}
