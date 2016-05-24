<?php

namespace spec\Eaty\Application\Handler;

use Eaty\Application\Caterers;
use Eaty\Application\Orders;
use Eaty\Application\Command;
use Eaty\Domain\Caterer;
use Eaty\Domain\Order;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Broadway\CommandHandling\CommandHandler;

class StartNewOrderForCatererSpec extends ObjectBehavior
{
    function it_is_command_handler()
    {
        $this->shouldHaveType(CommandHandler::class);
    }

    function let(
        Caterers $caterers
    ) {
        $this->beConstructedWith($caterers);
    }

    function it_adds_new_order_for_caterer_to_orders(
        Caterers $caterers,
        Caterer $caterer,
        Command\StartNewOrderForCaterer $command
    ) {
        $caterers->findCatererByName('Korova')->willReturn($caterer);

        $command->getCatererName()->willReturn('Korova');
        $command->getOrderId()->willReturn('Id');
        $command->getOrderOwner()->willReturn('Owner');

        $caterer->startOrder('Id', 'Owner')->shouldBeCalled();

        $this->handleStartNewOrderForCaterer($command);
    }
}
