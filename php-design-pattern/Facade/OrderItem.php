<?php

require_once 'Item.php';


class OrderItem
{
    private $item;
    private $amount;

    public function __construct(Item $item, $amount)
    {
        $this->item = $item;
        $this->amount = $amount;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}
