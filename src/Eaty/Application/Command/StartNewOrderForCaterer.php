<?php

namespace Eaty\Application\Command;


class StartNewOrderForCaterer
{
    /**
     * @var string
     */
    private $catererName;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $orderOwner;

    /**
     * @param string $catererName
     */
    public function __construct($catererName, $orderId, $orderOwner)
    {
        $this->catererName = $catererName;
        $this->orderId = $orderId;
        $this->orderOwner = $orderOwner;
    }

    /**
     * @return string
     */
    public function getCatererName()
    {
        return $this->catererName;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return string
     */
    public function getOrderOwner()
    {
        return $this->orderOwner;
    }
}
