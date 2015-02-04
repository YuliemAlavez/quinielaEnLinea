<?php

namespace Quiniela\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Mapping as ORM;

use SaadTazi\GChartBundle\DataTable;

use Quiniela\MainBundle\Form\PredictionType;


use Quiniela\MainBundle\Entity\Prediction;

use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        
        return $this->render('QuinielaMainBundle:Default:index.html.twig', array('name' => $name));
    }

    public function allTeamsAction(){

        $em= $this->getDoctrine()->getManager();
        $teams= $em->getRepository('QuinielaMainBundle:Team')->findAll();               

        $jsonTable="Hola";
       
        $table = new DataTable\DataTable();
        
   
        $table->addColumn('id1', 'Mes', 'string');
        $table->addColumnObject(new DataTable\DataColumn('id2', 'Temperatura', 'number'));

        $table->addRow(array('Enero',32.5));
        $table->addRow(array('Febrero',20.4));
        $table->addRow(array('Marzo',21.2));
        $table->addRow(array('Abril',12.4));
        $table->addRow(array('Mayo',15.3));
        $table->addRow(array('Junio',37.9));
                
        
    	return $this->render(
    		'QuinielaMainBundle:Default:viewAllTeams.html.twig',
    		array('teams'=>$teams,'jsonTable'=>$jsonTable,'table'=>$table->toArray())
    	);
        
    }
    public function newPredictionAction(Request $request){
        $prediction= new Prediction();
        $form = $this->createForm(new PredictionType(),$prediction);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($prediction);
            $em->flush();
            return $this->redirect($this->generateUrl('quiniela_list_all_teams'));
        }
        return $this->render("QuinielaMainBundle:Default:newPrediction.html.twig", array('form'=> $form->createView()));
    }
    
    public function loginAction(Request $request){
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
              SecurityContext::AUTHENTICATION_ERROR,
              $sesion->get(SecurityContext::AUTHENTICATION_ERROR));
        
        return $this->render('QuinielaMainBundle:Default:login.html.twig', array(
              'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
              'error'         => $error
        ));
    }
}
