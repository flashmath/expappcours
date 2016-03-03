<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 20/02/2016
 * Time: 18:31
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Table(name="app_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=25,unique=true)
     *
     */
    private $username;

    /**
     * @ORM\Column(type="string",length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string",length=60,unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active",type="boolean")
     */
    private $isActive;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user")
     */
    private $tasks;

    public function __construct(){
        $this->isActive = true;
        $this->usernotifications = new ArrayCollection();
        $this->tasks = new ArrayCollection();
    }
    /**
     * @return mixed
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /**
     * @param string $serialized
     * @return mixed
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {

        list(
            $this->id,
            $this->username,
            $this->password,
            )=unserialize($serialized);
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password=$password;
    }

    /**
     * @return mixed
     */
    public function eraseCredentials()
    {

    }

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * ORM\OneToMany(targetEntity="AppBundle\Entity\NotificationUser",mappedBy="user", cascade={"persist", "remove"})
     */
    private $usernotifications;

    public function getUserNotifications()
    {
        return $this->usernotifications;
    }

    private $addNotification = false;

    public function addUserNotifications(NotificationUser $notificationUser){

        if (!$this->addNotification) {
            $this->addNotification = true;
            $this->usernotifications[] = $notificationUser;

            $notificationUser->setUser($this);
            $this->addNotification = false;
        }

        return $this;
    }

    public function removeUserNotifications(NotificationUser $notificationUser){
        $this->usernotifications->removeElement($notificationUser);
    }

    /**
     * @return ArrayCollection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    public function addTask(Task $task){
        $this->tasks[] = $task;
    }

    public function removeTask(Task $task){
        $this->tasks->removeElement($task);
    }
}