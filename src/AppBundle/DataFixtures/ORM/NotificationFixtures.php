<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 01/03/2016
 * Time: 18:53
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Notification;

class NotificationFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $note1 = new Notification();
        $note1->setId(1);
        $note1->setContent("Ajout d'un utilisateur");
        $manager->persist($note1);

        $note2 = new Notification();
        $note1->setId(2);
        $note2->setContent("Ajout d'une fonctionnalité");
        $manager->persist($note2);

        $note3 = new Notification();
        $note1->setId(3);
        $note3->setContent("Ajout d'un service");
        $manager->persist($note3);

        $note4 = new Notification();
        $note1->setId(4);
        $note4->setContent("Ajout d'un commentaire");
        $manager->persist($note4);

        $manager->flush();

        $this->addReference('note-1',$note1);
        $this->addReference('note-2',$note2);
        $this->addReference('note-3',$note3);
        $this->addReference('note-4',$note4);
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 1;
    }
}