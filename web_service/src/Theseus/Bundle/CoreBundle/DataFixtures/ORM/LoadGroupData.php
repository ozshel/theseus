<?php

namespace Theseus\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Theseus\Bundle\CoreBundle\Entity\Group;

/**
 * @package Theseus\Bundle\CoreBundle\DataFixtures\ORM
 */
class LoadGroupData extends AbstractFixture 
    implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load Group Roles
     *
     */
    public function load(ObjectManager $manager)
    {
        $groupAdmin = new Group('Admin');
        $groupAdmin->setRoles(array('ROLE_ADMIN'));
        $manager->persist($groupAdmin);
        
        $groupUser = new Group('Utilisateur');
        $groupUser->setRoles(array('ROLE_USER'));
        $manager->persist($groupUser);

        $manager->flush();

        $this->addReference('groupAdmin', $groupAdmin);
        $this->addReference('groupUser', $groupUser);

    }
    
    /**
     * Set the execution order for fixtures
     *
     */
    public function getOrder()
    {
        return 1;
    }
}