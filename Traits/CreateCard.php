<?php 

trait CreateCard
{

    public function createCard($obj){

        extract($obj);
        include __DIR__ . '/../View/card.php';
        
    }
}

?>