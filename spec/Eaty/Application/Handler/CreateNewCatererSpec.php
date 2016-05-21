<?php

namespace spec\Eaty\Application\Handler;

use Eaty\Application\Caterers;
use Eaty\Application\Command;
use Eaty\Domain\Caterer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Broadway\CommandHandling\CommandHandler;

class CreateNewCatererSpec extends ObjectBehavior
{
    function it_is_command_handler()
    {
        $this->shouldHaveType(CommandHandler::class);
    }

    function let(Caterers $caterers)
    {
        $this->beConstructedWith($caterers);
    }

    function it_adds_new_caterer_to_caterers(
        Caterers $caterers,
        Command\CreateNewCaterer $command
    ) {
        $caterers->add(Argument::type(Caterer::class))->shouldBeCalled();

        $command->getCatererName()->willReturn('Korova');

        $this->handleCreateNewCaterer($command);
    }
}
