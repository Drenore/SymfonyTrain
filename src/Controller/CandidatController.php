<?php 

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidatController extends AbstractController
{
    /**
     * @Route("/candidat", name="candidat",methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class,$candidat);
        $form->handleRequest($request);
        $manager = $this->getDoctrine()->getManager();
        $candidats = $manager->getRepository(Candidat::class)->findAll();

        if($form->isSubmitted() && $form->isValid())
        {
            $ORM = $this->getDoctrine()->getManager();
            $ORM->persist($candidat);
            $ORM->flush();
            return $this->redirectToRoute('candidat');
        }
        return $this->render('candidat/index.html.twig',
        [
            'controller_name' => 'CandidatController',
            'formCandidat' => $form->createView(),
            'Candidats'=> $candidats
        ]);
        
    }

    /**
     * @Route("/supprimerCandidat/{id}", name="sup_candidat")
     */
    public function supprimer($id){
        
        $manager = $this->getDoctrine()->getManager();
        $candidat = $manager->getRepository(Candidat::class)->find($id);
        $manager->remove($candidat);
        $manager->flush();
        return $this->redirectToRoute('candidat');


    }

     /**
     * @Route("/afficheCandidat/{id}", name="aff_candidat")
     */
    public function afficherCandidat($id): Response 
    {
        
        $manager = $this->getDoctrine()->getManager();
        $candidat = $manager->getRepository(Candidat::class)->find($id);
        if(empty($candidat)){
            $candidat = NULL;
        }
            return $this->render('candidat/afficheCandidat.html.twig',
            [
            'controller_name' => 'CandidatController',
            'candidat' => $candidat
            ]);
        }
       


    
}