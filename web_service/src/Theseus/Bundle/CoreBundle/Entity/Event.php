<?php

namespace Theseus\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Event")
 * @ORM\Entity
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="datetime", nullable=false)
     */
    private $eventDate;
    
    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255, nullable=true)
     */
    private $place;
    
    /**
     * @var \Address
     *
     * @ORM\OneToOne(targetEntity="Address", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="address", referencedColumnName="id")
     * })
     */
    private $address;        
    
    /**
     * @var integer
     *
     * @ORM\Column(name="available", type="integer", nullable=true)
     */
    private $available;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="events", cascade={"all"})
     * @ORM\JoinTable(name="event_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user", referencedColumnName="id")
     *   }
     * )
     */
    private $users;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="events", cascade={"all"})
     * @ORM\JoinTable(name="event_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="event", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="product", referencedColumnName="id")
     *   }
     * )
     */
    private $products;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        
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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     * @return Event
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;
    
        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime 
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Event
     */
    public function setPlace($place)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set address
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Address $address
     * @return Event
     */
    public function setAddress(\Theseus\Bundle\CoreBundle\Entity\Address $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \Theseus\Bundle\CoreBundle\Entity\Address 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add user
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\User $user
     * @return Event
     */
    public function addUser(\Theseus\Bundle\CoreBundle\Entity\User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\User $user
     */
    public function removeUser(\Theseus\Bundle\CoreBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set available
     *
     * @param integer $available
     * @return Event
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    
        return $this;
    }

    /**
     * Get available
     *
     * @return integer 
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Add products
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Product $products
     * @return Event
     */
    public function addProduct(\Theseus\Bundle\CoreBundle\Entity\Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Product $products
     */
    public function removeProduct(\Theseus\Bundle\CoreBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }
}
