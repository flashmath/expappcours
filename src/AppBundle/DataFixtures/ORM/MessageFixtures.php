<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 03/03/2016
 * Time: 20:30
 */

namespace AppBundle\DataFixtures;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Message;

class MessageFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $message1 = new Message();
        $message1->setId(1);
        $message1->setObject('Message de test');
        $message1->setContent("Ajout des fonctionnalités de test");
        $message1->setFromUser($this->getReference('user'));
        $message1->setToUser($this->getReference('admin'));
        $manager->persist($message1);

        $manager->flush();
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 5;
    }
}