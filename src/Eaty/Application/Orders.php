<?php

namespace Eaty\Application;

use Eaty\Domain\Caterer;
use Eaty\Domain\Order;

interface Orders
{
    /**
     * @param Caterer $caterer
     *
     * @return null|Order
     */
    public function findOrderByCaterer(Caterer $caterer);

    /**
     * @param Order $order
     */
    public function add(Order $order);
}