<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 01/03/2016
 * Time: 20:18
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;
use AppBundle\Entity\Notification;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Class NotificationUser
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserNotificationRepository")
 * @ExclusionPolicy("all")
 */
class NotificationUser
{
    const NOTIFICATION_LU = 1;
    const NOTIFICATION_NONLU = 0;

   // private $users;
    //private $notifications;

    /**
     * NotificationUser constructor.
     */
    public function __construct()
    {
       // $this->users = new ArrayCollection();
        //$this->notifications = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="lu",type="boolean")
     */
    private $lu = self::NOTIFICATION_NONLU;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * @param mixed $lu
     */
    public function setLu($lu)
    {
        $this->lu = $lu;
    }

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="usernotifications")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="User_id",referencedColumnName="id",nullable=false)
     * })
     */
    private $user;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Notification",inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $notification;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        if ($this->user != $user){
            $this->user = $user;
            $user->addUserNotifications($this);
        }
    }

    /**
     * @return mixed
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param mixed $notification
     */
    public function setNotification(Notification $notification)
    {
        if ($this->notification != $notification) {
            $this->notification = $notification;
            $notification->addNotificationUser($this);
        }
    }


}