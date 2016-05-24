<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Broadway\CommandHandling\SimpleCommandBus;
use Eaty\Application\Caterers;
use Eaty\Application\Command;
use Eaty\Application\Handler;
use Eaty\Domain\Exception\OrderNotFoundException;
use Eaty\Domain\Order;
use Eaty\Infrastructure\InMemory;

class OrderManagingContext implements Context, SnippetAcceptingContext
{
    /**
     * @var SimpleCommandBus
     **/
    private $commandBus;

    /**
     * @var Caterers
     */
    private $caterers;

    /**
     * @var string
     */
    private $startedOrderCaterer;

    /**
     * @var string
     */
    private $startedOrderId;

    /**
     * @var string
     */
    private $starterOrderOwner;

    public function __construct()
    {
        $this->commandBus = new SimpleCommandBus();
        $this->caterers = new InMemory\Caterers();

        $this->commandBus->subscribe(
            new Handler\CreateNewCaterer($this->caterers)
        );
        $this->commandBus->subscribe(
            new Handler\StartNewOrderForCaterer($this->caterers)
        );
    }

    /**
     * @Given there are following caterers:
     */
    public function thereAreFollowingCaterers(TableNode $caterersParameters)
    {
        foreach ($caterersParameters as $catererParameters) {
            $command = new Command\CreateNewCaterer($catererParameters['name']);
            $this->commandBus->dispatch($command);
        }
    }

    /**
     * @When I start order for :catererName caterer
     */
    public function iStartOrderForCaterer($catererName)
    {
        $orderId = 'orderId';
        $orderOwner = 'orderOwner';
        $command = new Command\StartNewOrderForCaterer($catererName, $orderId, $orderOwner);
        $this->commandBus->dispatch($command);

        $this->startedOrderCaterer = $catererName;
        $this->startedOrderId = $orderId;
        $this->starterOrderOwner = $orderOwner;
    }

    /**
     * @Then new order for :catererName caterer should be open
     */
    public function newOrderForCatererShouldBeOpen($catererName)
    {
        $caterer = $this->caterers->findCatererByName($catererName);

        try {
            $caterer->getOrder($this->startedOrderId);
        } catch (OrderNotFoundException $e) {
            throw new \LogicException(sprintf('There is no started order for %s caterer.', $catererName));
        }
    }

    /**
     * @Then I should become order keeper of :catererName order
     */
    public function iShouldBecomeOrderKeeperOfOrder($catererName)
    {
        $caterer = $this->caterers->findCatererByName($catererName);

        /** @var Order $order */
        $order = $caterer->getOrder($this->startedOrderId);
        if ($order->getOwner() !== $this->starterOrderOwner) {
            throw new \LogicException(sprintf('You are not owner of the order.', $catererName));
        }
    }
}
