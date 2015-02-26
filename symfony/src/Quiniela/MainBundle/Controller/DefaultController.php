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

        $matrixPredictionsUsers=array();

        foreach ($gamesSeason as $game) {
            $matrixPredictionsUsers[0][ $game->getIdgame() ]= $game;
        }
        
        $totalPoints=array();
        
        
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



            //$numberPredictions[$us->getidUser()]=count($predictionsUsers[$us->getidUser()])-1 ;
            foreach ($predictionsUsers[$us->getidUser()] as $prediction) { 
                //$totalPoints[$us->getidUser()]+=3;
                //$matrixPredictionsUsers[$us->getidUser()][$prediction->getGame()]=$prediction;
            }
            
            /*
            $flag=true;
            
            $totalPoints[$us->getidUser()]=0;
            for($i=0;$i<9;$i++){

                if(isset( $predictionsUsers[$us->getidUser()][$i] )){
                    $matrixPredictionsUsers[$us->getidUser()][$predictionsUsers[$us->getidUser()][$i]->getGame()]=$predictionsUsers[$us->getidUser()][$i];
                }
                else{
                    $matrixPredictionsUsers[$us->getidUser()][$predictionsUsers[$us->getidUser()][$i]->getGame()]=new Prediction();
                    $flag=false;
                }
                if( $flag ){
                    if( ($matrixPredictionsUsers[$us->getidUser()][$i]->getScorelocalteam() == 
                            $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorelocalteam() ) &&
                            ($matrixPredictionsUsers[$us->getidUser()][$i]->getScorevisitingteam() == 
                            $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorevisitingteam() )
                        )
                    {
                        $totalPoints[$us->getidUser()]+=3;
                        
                    }
                    elseif( (   
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorelocalteam() > 
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorevisitingteam()
                            ) 
                            &&
                            (
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorelocalteam() >
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorevisitingteam() 
                            )

                        )
                    {
                        $totalPoints[$us->getidUser()]+=1;

                    }
                    elseif( (   
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorelocalteam() < 
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorevisitingteam()
                            ) 
                            &&
                            (
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorelocalteam() <
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorevisitingteam() 
                            )

                        )
                    {
                        $totalPoints[$us->getidUser()]+=1;

                    }
                    elseif( (   
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorelocalteam() == 
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getGame()->getScorevisitingteam()
                            ) 
                            &&
                            (
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorelocalteam() ==
                                $matrixPredictionsUsers[$us->getidUser()][$i]->getScorevisitingteam() 
                            )

                        )
                    {
                        $totalPoints[$us->getidUser()]+=1;

                    }
                }
                
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
                                array(
                                    'user'=>$user,
                                    'users'=>$users,
                                    'predictionsUsers'=>$predictionsUsers,
                                    'totalPoints'=>$totalPoints,
                                    'gamesSeason'=>$gamesSeason,
                                    'matrixPredictionsUsers'=>$matrixPredictionsUsers
                                    
                                    )
                            );


    }
}

