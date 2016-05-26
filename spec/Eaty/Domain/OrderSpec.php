<?php

namespace spec\Eaty\Domain;

use Eaty\Domain\Identifier;
use Eaty\Domain\Owner;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrderSpec extends ObjectBehavior
{
    function let(
        Identifier $id,
        Owner $owner
    ) {
        $this->beConstructedWith($id, $owner);
    }

    function it_has_identifier(
        Identifier $id
    ) {
        $this->getId()->shouldReturn($id);
    }

    function it_provider_information_about_its_owner(
        Owner $owner
    ) {
        $this->getOwner()->shouldReturn($owner);
    }
}
