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
     * @var Orders
     */
    private $orders;

    /**
     * @var Caterers
     */
    private $caterers;

    public function __construct(Orders $orders, Caterers $caterers)
    {
        $this->orders = $orders;
        $this->caterers = $caterers;
    }

    public function handleStartNewOrderForCaterer(Command\StartNewOrderForCaterer $command)
    {
        $caterer = $this->caterers->findCatererByName($command->getCatererName());
        $order = new Order($caterer);

        $this->orders->add($order);
    }
}
