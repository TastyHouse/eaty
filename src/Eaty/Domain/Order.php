<?php

namespace Eaty\Domain;

class Order
{
    /**
     * @var Caterer
     */
    private $caterer;

    /**
     * Order constructor.
     */
    public function __construct(Caterer $caterer)
    {
        $this->caterer = $caterer;
    }

    /**
     * @return Caterer
     */
    public function getCaterer()
    {
        return $this->caterer;
    }
}