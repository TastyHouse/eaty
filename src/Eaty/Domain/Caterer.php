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

    public function getOrder($orderId)
    {
        if (!array_key_exists($orderId, $this->orders)) {
            throw new OrderNotFoundException(sprintf('There is no order with %s id.', $orderId));
        }

        return $this->orders[$orderId];
    }

    /**
     * @param Order $order
     */
    public function startOrder($orderId, $orderOwner)
    {
        $this->orders[$orderId] = new Order(
            $orderId,
            $orderOwner
        );
    }
}