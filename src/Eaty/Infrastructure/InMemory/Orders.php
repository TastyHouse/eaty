<?php

namespace Eaty\Infrastructure\InMemory;

use Eaty\Application\Orders as OrdersInterface;
use Eaty\Domain\Caterer;
use Eaty\Domain\Order;

class Orders implements OrdersInterface
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