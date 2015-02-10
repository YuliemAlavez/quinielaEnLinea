<?php

namespace Quiniela\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\Extension\Core\Type\DateTimes;

use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Mapping as ORM;

use SaadTazi\GChartBundle\DataTable;

use Quiniela\MainBundle\Form\PredictionType;
use Quiniela\MainBundle\Form\GameType;


use Quiniela\MainBundle\Entity\Prediction;
use Quiniela\MainBundle\Entity\Game;


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
        
        $usuario=$this->get('security.context')->getToken()->getUser();        
        $nombre=$usuario->getName();

        
    	return $this->render(
    		'QuinielaMainBundle:Default:viewAllTeams.html.twig',
    		array('teams'=>$teams,'jsonTable'=>$jsonTable,'table'=>$table->toArray(),'nombre'=>$nombre,'usuario'=>$usuario)
    	);
        
    }
    public function newPredictionAction(Request $request){
        $prediction= new Prediction();


        $user=$this->get('security.context')->getToken()->getUser();

        $prediction->setUser($user);

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

    public function newPredictionsAction(Request $request){
        $prediction= new Prediction();


        $user=$this->get('security.context')->getToken()->getUser();

        $prediction->setUser($user);

        $form = $this->createForm(new PredictionType(),$prediction);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($prediction);
            $em->flush();
            return $this->redirect($this->generateUrl('quiniela_list_all_teams'));
        }
        return $this->render("QuinielaMainBundle:Default:newPredictions.html.twig", array('form'=> $form->createView()));
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

    public function newGameAction(Request $request){
            $game=new Game();
            

            $form=$this->createForm( new GameType(),$game );
            
            $form->handleRequest($request);

            if($form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $em->persist($game);
                $em->flush();
                return $this->redirect( $this->generateUrl('quiniela_general_table') );
            }

            return $this->render("QuinielaMainBundle:Default:newGame.html.twig",array('form'=>$form->createView()));
    }

    public function generalTableAction(){
        
        $season=3;
        //Obteniendo al usuario actual que está en el sistema
        $user=$this->get('security.context')->getToken()->getUser();        
        
        //Obtengo de la base de datos a todos los usuarios
        $em= $this->getDoctrine()->getManager();   

        $predictionsUsers;

        $users= $em->getRepository('QuinielaMainBundle:User')->findAll();

        $gamesSeason=$em->getRepository('QuinielaMainBundle:Game')->findBySeason($season,array('gameat'=>'ASC'));

        
        
       
        
        foreach ($users as $us ) {            
            $query= $em->createQuery('  SELECT o,g,s FROM 
                                                    QuinielaMainBundle:Prediction o JOIN 
                                                    o.game g JOIN
                                                    g.season s
                                                WHERE 
                                                    s = :season AND
                                                    o.user = :user                                                
                                    ');
            $query->setParameter('season',$season);
            $query->setParameter('user',$us->getidUser());



            $predictionsUsers[$us->getidUser()]=$query->getResult();
            $numberPredictions[$us->getidUser()]=count($predictionsUsers[$us->getidUser()])-1 ;



            /*
            for($i=1;$i<=count($predictionsUser);$i++){
                $predictionsUsers[$us->getidUser()][$predictionsUser[$i]->getGame()]=$predictionsUser[$i];
            }     
            */            
            
            //Obtengo todas la predicciones por usuario
        
            
           //Obtenemos las predicciones de los usuarios por todas las jornadas
           //$predictionsUsers[$us->getidUser()]=$em->getRepository('QuinielaMainBundle:Prediction')->findByUser($us);            
        }
        
       


      
        //Obtenemos las predicciones del usuario por jornadas
        //$predictionsUser= $em->getRepository('QuinielaMainBundle:Prediction')->findAll;


        //Obtenemos las predicciones de los usuarios por todas las jornadas
        //$predictionsUsers=$em->getRepository('QuinielaMainBundle:Prediction')->findAll();


        return $this->render('QuinielaMainBundle:Default:generalTable.html.twig',
                                array('user'=>$user,'users'=>$users,'predictionsUsers'=>
                                    $predictionsUsers,'gamesSeason'=>$gamesSeason,                                    
                                    'numberPredictions' =>$numberPredictions
                                    
                                    )
                            );


    }
}

