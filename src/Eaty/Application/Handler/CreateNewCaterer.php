<?php

namespace Eaty\Application\Handler;

use Broadway\CommandHandling\CommandHandler;
use Eaty\Application\Caterers;
use Eaty\Application\Command;
use Eaty\Domain\Caterer;

class CreateNewCaterer extends CommandHandler
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
     * @param Command\CreateNewCaterer $command
     */
    public function handleCreateNewCaterer(Command\CreateNewCaterer $command)
    {
        $caterer = new Caterer($command->getCatererName());

        $this->caterers->add($caterer);
    }
}
