<?php

namespace Quiniela\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

use SaadTazi\GChartBundle\DataTable;

use Quiniela\MainBundle\Form\PredictionType;


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
    public function newPredictionAction(){
        $form = $this->createForm(new PredictionType());

        return $this->render("QuinielaMainBundle:Default:newPrediction.html.twig", array('form'=> $form->createView()));
    }
}
