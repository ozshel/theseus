<?php 
namespace Theseus\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Theseus\Bundle\CoreBundle\Entity\User;

/**
 * @package Theseus\Bundle\CoreBundle\DataFixtures\ORM
 */
class LoadAdminUserData extends AbstractFixture 
    implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load Group Roles
     *
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEnabled(true);
        $admin->setEmail('nhim.saheme95@gmail.com');
        $admin->setUsername('nhim.saheme95@gmail.com');
        $admin->setPlainPassword('admin');
        $admin->setFirstname('Bob');
        $admin->setLastname('Bob');
        $admin->addGroup($this->getReference('groupAdmin'));
        $manager->persist($admin);
        
        $user = new User();
        $user->setEnabled(true);
        $user->setEmail('lol@example.com');
        $user->setUsername('lol@example.com');
        $user->setPlainPassword('admin');
        $user->setFirstname('lol');
        $user->setLastname('lol');
        $user->addGroup($this->getReference('groupUser'));
        $manager->persist($user);

        $manager->flush();
    }
    
    /**
     * Set the execution order for fixtures
     *
     */
    public function getOrder()
    {
        return 2;
    }
}