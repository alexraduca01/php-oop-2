<?php 

class Product
{
    protected float $price;
    private int $discount = 0;
    protected int $quantity;

    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

}

?>