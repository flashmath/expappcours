<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 01/03/2016
 * Time: 20:39
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\NotificationUser;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class NotificationUserFixtures extends AbstractFixture implements OrderedFixtureInterface
{


    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $notUser1 = new NotificationUser();
        $notUser1->setNotification($this->getReference('note-1'));
        $notUser1->setUser($this->getReference('admin'));
        $manager->persist($notUser1);

        $notUser2 = new NotificationUser();
        $notUser2->setNotification($this->getReference('note-2'));
        $notUser2->setUser($this->getReference('admin'));
        $manager->persist($notUser2);

        $notUser3 = new NotificationUser();
        $notUser3->setNotification($this->getReference('note-3'));
        $notUser3->setUser($this->getReference('admin'));
        $notUser3->setLu(true);
        $manager->persist($notUser3);

        $notUser4 = new NotificationUser();
        $notUser4->setNotification($this->getReference('note-1'));
        $notUser4->setUser($this->getReference('user'));
        $manager->persist($notUser4);

        $notUser5 = new NotificationUser();
        $notUser5->setNotification($this->getReference('note-4'));
        $notUser5->setUser($this->getReference('user'));
        $manager->persist($notUser1);

        $manager->flush();
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 3;
    }
}