<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Broadway\CommandHandling\SimpleCommandBus;
use Eaty\Application\Caterers;
use Eaty\Application\Command;
use Eaty\Application\Handler;
use Eaty\Infrastructure\InMemory;
use Eaty\Application\Orders;

class OrderManagingContext implements Context, SnippetAcceptingContext
{
    /**
     * @var SimpleCommandBus
     **/
    private $commandBus;

    /**
     * @var string
     **/
    private $catererWithStartedOrderName;

    /**
     * @var Orders
     */
    private $orders;

    /**
     * @var Caterers
     */
    private $caterers;

    public function __construct()
    {
        $this->commandBus = new SimpleCommandBus();
        $this->orders = new InMemory\Orders();
        $this->caterers = new InMemory\Caterers();

        $this->commandBus->subscribe(
            new Handler\CreateNewCaterer($this->caterers)
        );
        $this->commandBus->subscribe(
            new Handler\StartNewOrderForCaterer($this->orders, $this->caterers)
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
        $command = new Command\StartNewOrderForCaterer($catererName);
        $this->commandBus->dispatch($command);

        $this->catererWithStartedOrderName = $catererName;
    }

    /**
     * @Then new order for :catererName caterer should be open
     */
    public function newOrderForCatererShouldBeOpen($catererName)
    {
        $caterer = $this->caterers->findCatererByName($catererName);
        $order = $this->orders->findOrderByCaterer($caterer);

        if (is_null($order)) {
            throw new \LogicException(sprintf('There is no started order for %s caterer.', $catererName));
        }

        if ($order->getCaterer()->getName() !== $this->catererWithStartedOrderName) {
            throw new \LogicException(sprintf('Order should be started for %s caterer.', $catererName));
        }
    }

    /**
     * @Then I should become order keeper of :catererName order
     */
    public function iShouldBecomeOrderKeeperOfOrder($catererName)
    {
        throw new PendingException();
    }
}
