<?php

namespace Quiniela\MainBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\Routing\Router;

class LoginListener
{
	private $router,$nombre=null;

	public function __construct(Router $router){
		//$this->router= $router;
	}

	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event){
			/*
			$usuario = $event->getAuthenticationToken()->getUser();
			
			$token = $event->getAuthenticationToken();
			$this->nombre = $token->getUser()->getName();
			
			echo $this->nombre;
			//echo $usuario;
			//$usuario->setUltimaConexion(new \DateTime());
			*/
	}

	public function onKernelResponse(FilterResponseEvent $event){
		if(null != $this->nombre){
			/*
			$portada = ...
			$event->setResponse(new RedirectResponse($portada));
			*/
			/*	
			$portada = $this->router->generate('portada', array('ciudad' => $this->ciudad));
			$event->setResponse(new RedirectResponse($portada));
			*/
		}
	}



}