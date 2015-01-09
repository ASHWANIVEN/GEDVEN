<?php

namespace Screenfony\DemoBundle\Controller;

use Screenfony\DemoBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
//use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class UsersController extends Controller
{
	
	/**
	* @return array
	* @view()
	*/
	public function getUsersAction()
	{
		$users = $this->getDoctrine()->getRepository('ScreenfonyDemoBundle:User')->findAll();
		
		//return array('users' => $users);
		
		$serializer = $this->container->get('serializer');
		$serializedEntity = $serializer->serialize($users, 'json');
		
		
		$response = new Response( json_encode(array('users' => json_decode($serializedEntity ))));
        $response->headers->set('Content-Type', 'text/json; charset=ISO-8859-1');


        return $response;
		
		//return new Response($serializedEntity);
	}
	
	/**
	* @param User $user
	* @return array
	* @view()
	* @ParamConverter("user", class="ScreenfonyDemoBundle:User")
	*/
	public function getUserAction(User $user)
	{
		return array('user' => $user);
	}
}