<?php

namespace Eaty\Domain;

class Identifier
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->guardIsString($id);

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }

    private function guardIsString($potentialString)
    {
        if (!is_string($potentialString)) {
            throw new \InvalidArgumentException('Identifier should be instantiated by string');
        }
    }
}
