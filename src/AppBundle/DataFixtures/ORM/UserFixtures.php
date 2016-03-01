<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 21/02/2016
 * Time: 19:21
 */

namespace AppBundle\DataFixtures;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('flash_math@yahoo.fr');
        $user1->setId(1);
        $user1->setUsername('admin');
        $user1->setPassword(password_hash('test',PASSWORD_BCRYPT));
        $user1->addNotification($this->getReference('note-1'));
        $user1->addNotification($this->getReference('note-2'));
        $user1->addNotification($this->getReference('note-3'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('becasse@yahoo.fr');
        $user2->setId(2);
        $user2->setUsername('user');
        $user2->setPassword(password_hash('test',PASSWORD_BCRYPT));
        $user2->addNotification($this->getReference('note-1'));
        $user2->addNotification($this->getReference('note-4'));
        $manager->persist($user2);

        $manager->flush();
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 2;
    }


}