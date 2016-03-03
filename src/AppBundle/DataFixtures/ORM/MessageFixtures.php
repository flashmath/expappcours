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

class MessageFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * @param ObjectManager $manager
     * @return mixed
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return 5;
    }
}