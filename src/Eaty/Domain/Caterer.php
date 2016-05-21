<?php

namespace Eaty\Domain;

class Caterer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $catererName
     */
    public function __construct($catererName)
    {
        $this->name = $catererName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}