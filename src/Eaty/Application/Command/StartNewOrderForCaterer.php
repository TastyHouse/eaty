<?php

namespace Eaty\Application\Command;


class StartNewOrderForCaterer
{
    /**
     * @var string
     */
    private $catererName;

    /**
     * @param string $catererName
     */
    public function __construct($catererName)
    {
        $this->catererName = $catererName;
    }

    /**
     * @return string
     */
    public function getCatererName()
    {
        return $this->catererName;
    }
}