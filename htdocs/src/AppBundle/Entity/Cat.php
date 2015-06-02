<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Cat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CatRepository")
 */
class Cat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Breed")
     */
    private $breed;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=50)
     */
    private $genre;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", length=2)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text")
     * @Assert\Length(min = 5, max = 1200)
     */
    private $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="revised", type="boolean")
     */
    private $revised;

    /**
     * @Assert\Image(maxSize = "500K")
     *
     */
    private $formPhoto;

    /**
     * @param UploadedFile $formPhoto
     */
    public function setFormPhoto(UploadedFile $formPhoto = null)
    {
      $this->formPhoto = $formPhoto;
    }

    /**
     * @return UploadedFile
     */
    public function getFormPhoto()
    {
      return $this->formPhoto;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param AppBundle\Entity\User $user
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Cat
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set breed
     *
     * @param AppBundle\Entity\Breed\ $breed
     */
    public function setBreed(\AppBundle\Entity\Breed $breed)
    {
        $this->breed = $breed;

        return $this;
    }

    /**
     * Get breed
     *
     * @return string 
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Cat
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Cat
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Cat
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Cat
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set revised
     *
     * @param boolean $revised
     * @return Cat
     */
    public function setRevised($revised)
    {
        $this->revised = $revised;

        return $this;
    }

    /**
     * Get revised
     *
     * @return boolean 
     */
    public function getRevised()
    {
        return $this->revised;
    }

    public function uploadPhoto($folder)
    {
      if(null === $this->formPhoto){
        return;
      }

      $photoName = uniqid('mycats-').'-photo.jpg';

      $this->formPhoto->move($folder, $photoName);
      $this->setPhoto($photoName);
    }

   public function __toString()
   {
    return $this->getBreed();
   }
}
