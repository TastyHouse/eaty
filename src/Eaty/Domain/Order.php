<?php

namespace Eaty\Domain;

class Order
{
    /**
     * @var Identifier
     */
    private $id;

    /**
     * @var Owner
     */
    private $owner;

    /**
     * @param Identifier $orderId
     * @param Owner $owner
     */
    public function __construct(Identifier $orderId, Owner $owner)
    {
        $this->id = $orderId;
        $this->owner = $owner;
    }

    /**
     * @return Identifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }
}