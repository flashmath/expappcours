<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 03/03/2016
 * Time: 15:57
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Task;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        $task1 = new Task();
        $task1->setContent('Faire le ménage');
        $task1->setState(Task::TODOTASK);
        $task1->setUser($this->getReference('admin'));
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setContent('Tâche terminée');
        $task2->setState(Task::ENDTASK);
        $task2->setUser($this->getReference('admin'));
        $manager->persist($task2);

        $task3 = new Task();
        $task3->setContent('Tâche en cours');
        $task3->setState(Task::TODOTASK);
        $task3->setUser($this->getReference('user'));
        $manager->persist($task3);

        $manager->flush();
    }
}