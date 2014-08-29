<?php

namespace Theseus\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="Theseus\Bundle\CoreBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @ORM\ManyToMany(targetEntity="Theseus\Bundle\CoreBundle\Entity\Group")
     * @ORM\JoinTable(name="UserGroup",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
    
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone",  type="string", length=255, nullable=true)
     */
    protected $phone;    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     */
    private $birthday;        
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Event", mappedBy="users")
     */
    private $events;
    
    /**
     * @var \ProductOrder
     *
     * @ORM\OneToMany(targetEntity="ProductOrder", mappedBy="user", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productOrders", referencedColumnName="id")
     * })
     */
    private $productOrders;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->enabled = true;
        $this->createdAt = new \DateTime();
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
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set address
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Address $address
     * @return User
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
     * Add events
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\User $events
     * @return User
     */
    public function addEvent(\Theseus\Bundle\CoreBundle\Entity\User $events)
    {
        $this->events[] = $events;
    
        return $this;
    }

    /**
     * Remove events
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\User $events
     */
    public function removeEvent(\Theseus\Bundle\CoreBundle\Entity\User $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Add productOrders
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\ProductOrder $productOrders
     * @return User
     */
    public function addProductOrder(\Theseus\Bundle\CoreBundle\Entity\ProductOrder $productOrders)
    {
        $this->productOrders[] = $productOrders;
    
        return $this;
    }

    /**
     * Remove productOrders
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\ProductOrder $productOrders
     */
    public function removeProductOrder(\Theseus\Bundle\CoreBundle\Entity\ProductOrder $productOrders)
    {
        $this->productOrders->removeElement($productOrders);
    }

    /**
     * Get productOrders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductOrders()
    {
        return $this->productOrders;
    }
}
