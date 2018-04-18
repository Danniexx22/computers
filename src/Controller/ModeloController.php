<?php

namespace App\Controller;

use App\Entity\Modelo;
use App\Form\ModeloType;
use App\Repository\ModeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/modelo")
 */
class ModeloController extends Controller
{
    /**
     * @Route("/", name="modelo_index", methods="GET")
     */
    public function index(ModeloRepository $modeloRepository): Response
    {
        return $this->render('modelo/index.html.twig', ['modelos' => $modeloRepository->findAll()]);
    }

    /**
     * @Route("/new", name="modelo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $modelo = new Modelo();
        $form = $this->createForm(ModeloType::class, $modelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modelo);
            $em->flush();

            return $this->redirectToRoute('modelo_index');
        }

        return $this->render('modelo/new.html.twig', [
            'modelo' => $modelo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modelo_show", methods="GET")
     */
    public function show(Modelo $modelo): Response
    {
        return $this->render('modelo/show.html.twig', ['modelo' => $modelo]);
    }


    /**
     * @Route("/{id}/showone")
     */
    public function showone(Modelo $modelo): Response
    {
        return $this->render('modelo/showone.html.twig', ['modelo' => $modelo]);
    }

    /**
     * @Route("/{id}/edit", name="modelo_edit", methods="GET|POST")
     */
    public function edit(Request $request, Modelo $modelo): Response
    {
        $form = $this->createForm(ModeloType::class, $modelo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modelo_edit', ['id' => $modelo->getId()]);
        }

        return $this->render('modelo/edit.html.twig', [
            'modelo' => $modelo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="modelo_delete", methods="DELETE")
     */
    public function delete(Request $request, Modelo $modelo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modelo);
            $em->flush();
        }

        return $this->redirectToRoute('modelo_index');
    }
}
