<?php

namespace Eaty\Infrastructure\InMemory;

use Eaty\Application\Caterers as CaterersInterface;
use Eaty\Domain\Caterer;

class Caterers implements CaterersInterface
{
    /**
     * @var array|Caterer[]
     */
    private $caterers = [];

    /**
     * @param string $name
     * @return null|Caterer
     */
    public function findCatererByName($name)
    {
        if (array_key_exists($name, $this->caterers)) {
            return $this->caterers[$name];
        }
    }

    /**
     * @param Caterer $caterer
     */
    public function add(Caterer $caterer)
    {
        $this->caterers[$caterer->getName()] = $caterer;
    }
}