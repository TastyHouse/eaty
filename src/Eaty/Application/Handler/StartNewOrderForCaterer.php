<?php

namespace Eaty\Application\Handler;

use Broadway\CommandHandling\CommandHandler;
use Eaty\Application\Caterers;
use Eaty\Application\Orders;
use Eaty\Application\Command;
use Eaty\Domain\Order;

class StartNewOrderForCaterer extends CommandHandler
{

    /**
     * @var Caterers
     */
    private $caterers;

    public function __construct(Caterers $caterers)
    {
        $this->caterers = $caterers;
    }

    public function handleStartNewOrderForCaterer(Command\StartNewOrderForCaterer $command)
    {
        $caterer = $this->caterers->findCatererByName($command->getCatererName());

        $caterer->startOrder($command->getOrderId(), $command->getOrderOwner());
    }
}
