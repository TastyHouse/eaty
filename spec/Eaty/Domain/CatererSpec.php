<?php

namespace spec\Eaty\Domain;

use Eaty\Domain\Exception\OrderNotFoundException;
use Eaty\Domain\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CatererSpec extends ObjectBehavior
{
    function it_provides_information_about_their_name()
    {
        $this->beConstructedWith('Korova');

        $this->getName()->shouldReturn('Korova');
    }

    function it_allows_to_start_new_order_for_caterer()
    {
        $this->beConstructedWith('Korova');

        $orderId = 'Id';
        $orderOwner = 'Owner';

        $this->shouldThrow(new OrderNotFoundException(sprintf('There is no order with %s id.', $orderId)))
            ->during('getOrder', [$orderId]);

        $this->startOrder($orderId, $orderOwner);

        /** @var Order $order */
        $order = $this->getOrder($orderId);
        $order->getId()->shouldReturn('Id');
        $order->getOwner()->shouldReturn('Owner');
    }
}
