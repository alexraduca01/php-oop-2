<?php 
include __DIR__ . '/../Traits/CreateCard.php';
class Product
{

    use CreateCard;
    protected float $price;
    private int $discount = 0;
    protected int $quantity;

    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function createDiscount($num){
        if($num < 10 || $num > 90){
            throw new Exception('Discount must be between 10 and 90');
        } else {
            $this->discount = $num;
        }
    }

    public function setDiscount(){
        return $this->discount;
    }

}

?>