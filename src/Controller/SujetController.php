<?php

namespace App\Controller;
use App\Entity\Sujet;
use App\Repository\SujetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SujetController extends AbstractController
{
    /**
     * @Route("/sujet", name="app_sujet")
     */
    public function index(): Response
    {   
        $manager = $this->getDoctrine()->getManager();
        $sujets = $manager->getRepository(Sujet::class)->findAll();

        if(empty($sujets)){
            $sujets = NULL; 
        }
        
        return $this->render('Sujet/allSujet.html.twig', [
            'controller_name' => 'SujetController',
            'Sujets' => $sujets
        
        ]);
    }
    /**
     * @Route("/supprimer/{id}", name="sup_sujet")
     */
    public function supprimer($id){
        
        $manager = $this->getDoctrine()->getManager();
        $sujet = $manager->getRepository(Sujet::class)->find($id);
        $manager->remove($sujet);
        $manager->flush();
        return $this->redirectToRoute('app_sujet');


    }
}
