<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class DishContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given Open Order for :arg1 Caterer exists
     */
    public function openOrderForCatererExists($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I add :arg1 as name and :arg2 as price of a dish and :arg3 as Special Wish
     */
    public function iAddAsNameAndAsPriceOfADishAndAsSpecialWish($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }

    /**
     * @Then I should have :arg1 for :arg2 with :arg3 as mine in order
     */
    public function iShouldHaveForWithAsMineInOrder($arg1, $arg2, $arg3)
    {
        throw new PendingException();
    }

}
