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

    public function setDiscount($title){
        if($title == 'Gunfight at Rio Bravo'){
            return $this->discount = 20;
        } else {
            return $this->discount;
        }
    }
}

?>