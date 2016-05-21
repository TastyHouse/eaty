<?php

namespace spec\Eaty\Domain;

use Eaty\Domain\Caterer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function it_provider_information_about_caterer_it_is_started_for(Caterer $caterer)
    {
        $this->beConstructedWith($caterer);

        $this->getCaterer()->shouldReturn($caterer);
    }
}
