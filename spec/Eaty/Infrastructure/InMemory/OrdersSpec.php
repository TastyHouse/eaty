<?php

namespace spec\Eaty\Infrastructure\InMemory;

use Eaty\Domain\Caterer;
use Eaty\Domain\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Eaty\Application\Orders;

class OrdersSpec extends ObjectBehavior
{
    function it_is_orders()
    {
        $this->shouldHaveType(Orders::class);
    }

    function it_allows_to_add_order(Order $order)
    {
        $this->add($order);
    }

    function it_allows_to_find_order_by_caterer(
        Order $order,
        Caterer $caterer,
        Caterer $falseCaterer
    ) {
        $caterer->getName()->willReturn('Korova');
        $falseCaterer->getName()->willReturn('Saluto');
        $order->getCaterer()->willReturn($caterer);

        $this->add($order);

        $this->findOrderByCaterer($caterer)->shouldReturn($order);
        $this->findOrderByCaterer($falseCaterer)->shouldReturn(null);
    }
}
