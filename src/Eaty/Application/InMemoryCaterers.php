<?php

namespace Eaty\Application;

use Eaty\Application\Caterers;
use Eaty\Domain\Caterer;

class InMemoryCaterers implements Caterers
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