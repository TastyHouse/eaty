<?php

namespace Eaty\Domain;

class Owner
{
    /**
     * @var string
     */
    private $ownerName;


    /**
     * @param string $ownerName
     */
    public function __construct($ownerName)
    {
        $this->guardIsString($ownerName);

        $this->ownerName = $ownerName;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->ownerName;
    }

    private function guardIsString($potentialString)
    {
        if (!is_string($potentialString)) {
            throw new \InvalidArgumentException('Owner should be instantiated by string');
        }
    }
}
