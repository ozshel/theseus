<?php

namespace Theseus\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="EventSale")
 * @ORM\Entity
 */
class EventSale
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
     * @var float
     *
     * @ORM\Column(name="total", type="float", length=255, nullable=true)
     */
    private $total; 
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", length=255, nullable=true)
     */
    private $quantity; 
    
    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;
    
    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product", referencedColumnName="id")
     * })
     */
    private $product;
    
    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="event", referencedColumnName="id")
     * })
     */
    private $event;
    
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
     * Set total
     *
     * @param float $total
     * @return EventSale
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return EventSale
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set user
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\User $user
     * @return EventSale
     */
    public function setUser(\Theseus\Bundle\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Theseus\Bundle\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set product
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Product $product
     * @return EventSale
     */
    public function setProduct(\Theseus\Bundle\CoreBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Theseus\Bundle\CoreBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set event
     *
     * @param \Theseus\Bundle\CoreBundle\Entity\Event $event
     * @return EventSale
     */
    public function setEvent(\Theseus\Bundle\CoreBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \Theseus\Bundle\CoreBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
