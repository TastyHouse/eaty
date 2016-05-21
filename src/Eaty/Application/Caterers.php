<?php

namespace Eaty\Application;

use Eaty\Domain\Caterer;

interface Caterers
{
    /**
     * @param string $name
     * @return null|Caterer
     */
    public function findCatererByName($name);

    /**
     * @param Caterer $caterer
     */
    public function add(Caterer $caterer);
}