<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 21/02/2016
 * Time: 19:21
 */

namespace AppBundle\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class UserFixtures implements FixtureInterface
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
        $manager->persist($user1);

        $manager->flush();
    }
}