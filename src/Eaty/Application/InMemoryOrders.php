<?php

namespace Eaty\Application;

use Eaty\Application\Orders;
use Eaty\Domain\Caterer;
use Eaty\Domain\Order;

class InMemoryOrders implements Orders
{
    /**
     * @var array|Order[]
     */
    private $orders = [];

    /**
     * @param Caterer $caterer
     *
     * @return null|Order
     */
    public function findOrderByCaterer(Caterer $caterer)
    {
        foreach ($this->orders as $order) {
            if ($order->getCaterer()->getName() === $caterer->getName()) {
                return $order;
            }
        }
    }

    /**
     * @param Order $order
     */
    public function add(Order $order)
    {
        $this->orders[] = $order;
    }
}