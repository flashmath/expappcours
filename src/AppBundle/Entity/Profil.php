<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProfilRepository")
 */
class Profil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email2", type="string", length=60, nullable=true)
     */
    private $email2;

    /**
     * @var bool
     *
     * @ORM\Column(name="email2_confirmed", type="boolean")
     */
    private $email2Confirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=3, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=2, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="fuseau", type="string", length=25, nullable=true)
     */
    private $fuseau;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @var string
     * @ORM\Column(name="imageName", type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     *
     * @var File
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="User", mappedBy="profil")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email2
     *
     * @param string $email2
     *
     * @return Profil
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get email2
     *
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Set email2Confirmed
     *
     * @param boolean $email2Confirmed
     *
     * @return Profil
     */
    public function setEmail2Confirmed($email2Confirmed)
    {
        $this->email2Confirmed = $email2Confirmed;

        return $this;
    }

    /**
     * Get email2Confirmed
     *
     * @return bool
     */
    public function getEmail2Confirmed()
    {
        return $this->email2Confirmed;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Profil
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Profil
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set fuseau
     *
     * @param string $fuseau
     *
     * @return Profil
     */
    public function setFuseau($fuseau)
    {
        $this->fuseau = $fuseau;

        return $this;
    }

    /**
     * Get fuseau
     *
     * @return string
     */
    public function getFuseau()
    {
        return $this->fuseau;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Profil
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

}

