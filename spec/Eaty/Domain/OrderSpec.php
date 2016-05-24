<?php

namespace spec\Eaty\Domain;

use Eaty\Domain\Caterer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('orderId', 'orderOwner');
    }

    function it_provider_information_about_its_identifier()
    {
        $this->getId()->shouldReturn('orderId');
    }

    function it_provider_information_about_its_owner()
    {
        $this->getOwner()->shouldReturn('orderOwner');
    }
}
