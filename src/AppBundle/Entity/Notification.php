<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 01/03/2016
 * Time: 18:31
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Notification
 * @package AppBundle\Entity
 * @ORM\Table(name="app_notification")
 * @ORM\Entity
 */
class Notification
{
    /**
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var
     * @ORM\Column(name="content",type="text")
     *
     */
    private $content;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\NotificationUser",mappedBy="notification", cascade={"persist", "remove"})
     */
    private $users;

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    private $addNotification = false;

    public function addNotificationUser(NotificationUser $notificationUser){
       if (!$this->addNotification) {
           $this->addNotification = true;

           $this->users[] = $notificationUser;
           $notificationUser->setNotification($this);
           $this->addNotification = false;
       }

        return $this;
    }

    public function removeNotificationUser(NotificationUser $notificationUser){
        $this->users->removeElement($notificationUser);
    }

    /**
     * Notification constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
}