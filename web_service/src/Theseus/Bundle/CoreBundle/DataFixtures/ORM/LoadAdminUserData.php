<?php 
namespace Theseus\Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Theseus\Bundle\CoreBundle\Entity\User;
use Theseus\Bundle\CoreBundle\Entity\Address;

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
        $address = new Address();
        $address->setCity('Paris');
        $address->setCountry('France');
        $address->setPostalCode('75012');
        $address->setAddress('25 rue Claude Tillier');
        $address->setAdditionalAddress('2 eme etage');
        $manager->persist($address);
        
        $address2 = new Address();
        $address2->setCity('Lyon');
        $address2->setCountry('France');
        $address2->setPostalCode('69005');
        $address2->setAddress('54 rue Bob');
        $manager->persist($address2);
        
        $admin = new User();
        $admin->setEnabled(true);
        $admin->setEmail('nhim.saheme95@gmail.com');
        $admin->setUsername('nhim.saheme95@gmail.com');
        $admin->setPlainPassword('admin');
        $admin->setFirstname('Bob');
        $admin->setLastname('Bob');
        $admin->addGroup($this->getReference('groupAdmin'));
        $admin->addGroup($this->getReference('groupProductAdmin'));
        $admin->setBirthday(new \DateTime());
        $admin->setAddress($address);
        $manager->persist($admin);
        
        $user = new User();
        $user->setEnabled(true);
        $user->setEmail('lol@example.com');
        $user->setUsername('lol@example.com');
        $user->setPlainPassword('admin');
        $user->setFirstname('lol');
        $user->setLastname('lol');
        $user->addGroup($this->getReference('groupUser'));
        $user->setBirthday(new \DateTime());
        $user->setAddress($address2);
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