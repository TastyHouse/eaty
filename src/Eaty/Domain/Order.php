<?php

namespace Eaty\Domain;

class Order
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $owner;

    /**
     * Order constructor.
     */
    public function __construct($orderId, $owner)
    {
        $this->id = $orderId;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }
}