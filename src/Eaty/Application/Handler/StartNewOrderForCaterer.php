<?php

namespace Eaty\Application\Handler;

use Broadway\CommandHandling\CommandHandler;
use Eaty\Application\Caterers;
use Eaty\Application\Orders;
use Eaty\Application\Command;
use Eaty\Domain\Identifier;
use Eaty\Domain\Order;
use Eaty\Domain\Owner;

class StartNewOrderForCaterer extends CommandHandler
{
    /**
     * @var Caterers
     */
    private $caterers;


    /**
     * @param Caterers $caterers
     */
    public function __construct(Caterers $caterers)
    {
        $this->caterers = $caterers;
    }

    /**
     * @param Command\StartNewOrderForCaterer $command
     */
    public function handleStartNewOrderForCaterer(Command\StartNewOrderForCaterer $command)
    {
        $caterer = $this->caterers->findCatererByName($command->getCatererName());

        $caterer->startOrder(
            new Identifier($command->getOrderId()),
            new Owner($command->getOrderOwner())
        );
    }
}
