<?php

namespace spec\Eaty\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CatererSpec extends ObjectBehavior
{
    function it_provides_information_about_their_name()
    {
        $this->beConstructedWith('Korova');

        $this->getName()->shouldReturn('Korova');
    }
}
