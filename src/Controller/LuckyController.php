<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Computer;
use App\Form\ComputerType;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\ComputerRepository;

class LuckyController extends Controller
{
	/**
     * @Route("/", name="index")
     */
   public function showcomputers()
    {
        
       $repository = $this->getDoctrine()->getRepository(Computer::class);
       $computers = $repository->findAll();

        // if (!$computers) {
        //     throw $this->createNotFoundException(
        //         'No computer found'
        //     );
        // }
        

        return $this->render('lucky/number.html.twig', array(
            'results' => $computers,
            
        ));

    }

    /**
     * @Route("/{serie}/filter", name="filter")

     */
   public function showcomputersfilter($serie)
    {
       $repository = $this->getDoctrine()->getRepository(Computer::class);

       $computers = $repository->findLikeSerie($serie);
        
        if (!$computers) {
            throw $this->createNotFoundException(
                'No computer found'
           );
         }
        

        return $this->render('lucky/busqueda.html.twig', array(
            'results' => $computers,
            
        ));

    }

    /**
     * @Route("/add", name="add")
     * 
     * @param Request   $request
     * 
     * @return Response
     */
    public function add(Request $request)
    {
        $computer = new Computer();

        $form = $this->createForm(ComputerType::class, $computer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($computer);
            
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('lucky/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}/eliminar")
     */
   public function eliminar(Computer $computer)
    {
        $manager = $this->getDoctrine()->getManager();

        $manager->remove($computer);

        $manager->flush();

        return new JsonResponse(['ok' => true]);
    }

    

    /**
     * @Route("/{id}/edit", requirements={"id": "\d+"}, name="edit")
     * 
     * 
     * @param Request   $request
     * @param Computer   $computer
     * 
     * @return Response
     */

    public function edit(Request $request, Computer $computer){
        $form = $this->createForm(ComputerType::class, $computer);
        $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($computer);
            
            $em->flush();

            return $this->redirectToRoute('index');
            
        }

        return $this->render('lucky/edit.html.twig', array(
            'form' => $form->createView(),
            'computer' => $computer
        ));


    }



    /**
     * @Route("/{id}/mas", requirements={"id": "\d+"}, name="mas")
     */
   public function masinfo(Computer $computer)
    {

        return $this->render('lucky/showcomputer.html.twig', array(
            'computer' => $computer,
            
        ));

    }

}