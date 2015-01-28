<?php

namespace Quiniela\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('QuinielaMainBundle:Default:index.html.twig', array('name' => $name));
    }

    public function allTeamsAction(){
    	$em= $this->getDoctrine()->getEntityManager();
        
        $teams= $em->getRepository('QuinielaMainBundle:Team')->findAll();            	


    	return $this->render(
    		'QuinielaMainBundle:Default:viewAllTeams.html.twig',
    		array('teams'=>$teams)
    	);
    	
    }
}
