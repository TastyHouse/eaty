<?php

namespace spec\Eaty\Application;

use Eaty\Application\Caterers;
use Eaty\Domain\Caterer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InMemoryCaterersSpec extends ObjectBehavior
{
    function it_is_caterers()
    {
        $this->shouldHaveType(Caterers::class);
    }

    function it_allows_to_add_caterer(Caterer $caterer)
    {
        $this->add($caterer);
    }

    function it_allows_to_find_caterer_by_name(
        Caterer $caterer
    ) {
        $caterer->getName()->willReturn('Korova');

        $this->add($caterer);

        $this->findCatererByName('Korova')->shouldReturn($caterer);
        $this->findCatererByName('Saluto')->shouldReturn(null);
    }
}
