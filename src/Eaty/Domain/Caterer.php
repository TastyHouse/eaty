<?php

namespace Eaty\Domain;

use Eaty\Domain\Exception\OrderNotFoundException;

class Caterer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $orders = [];

    /**
     * @param string $catererName
     */
    public function __construct($catererName)
    {
        $this->name = $catererName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Identifier $orderId
     * @return Order
     */
    public function getOrder(Identifier $orderId)
    {
        if (!array_key_exists((string) $orderId, $this->orders)) {
            throw new OrderNotFoundException(sprintf('There is no order with %s id.', (string) $orderId));
        }

        return $this->orders[(string) $orderId];
    }

    /**
     * @param Identifier $orderId
     * @param Owner $orderOwner
     */
    public function startOrder(Identifier $orderId, Owner $orderOwner)
    {
        $this->orders[(string) $orderId] = new Order(
            $orderId,
            $orderOwner
        );
    }
}