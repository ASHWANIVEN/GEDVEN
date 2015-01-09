<?php

namespace Screenfony\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Screenfony\DemoBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
	/**
	* Load data fixtures with the passed EntityManager
	*
	*/
	public function load(ObjectManager $manager)
	{
		// TODO: Implement load() method.
		$alice = new User();
		$alice->setUsername('alice');
		$alice->setEmail('alice@screenfony.com');
		$alice->setPassword('fooalicepassword');
		
		$bob = new User();
		$bob->setUsername('bob');
		$bob->setEmail('bob@screenfony.com');
		$bob->setPassword('foobobpassword');
		
		$manager->persist($alice);
		$manager->persist($bob);
		
		$manager->flush();
	}
}