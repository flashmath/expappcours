<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 02/03/2016
 * Time: 20:08
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class UserNotificationRepository extends EntityRepository
{
    public function getNotificationsForUser($userId,$luState = true){
        $qb = $this->createQueryBuilder('un')
            ->select('un')
            ->where('un.user = :user_id')
            ->andWhere('un.lu = 0')
            ->setParameter('user_id',$userId);

        return $qb->getQuery()
            ->getResult();
    }
}