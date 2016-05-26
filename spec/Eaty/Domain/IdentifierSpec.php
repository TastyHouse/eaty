<?php

namespace spec\Eaty\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IdentifierSpec extends ObjectBehavior
{
    function it_can_be_used_as_string()
    {
        $this->beConstructedWith('Id');

        $this->__toString()->shouldBe('Id');
    }

    function it_guards_that_it_is_constructed_with_string()
    {
        $falseParameters = [new \stdClass(), 1, 0.3, []];

        foreach ($falseParameters as $falseParameter) {
            $this->shouldThrow(
                new \InvalidArgumentException('Identifier should be instantiated by string')
            )->during('__construct', [$falseParameter]);
        }
    }
}
