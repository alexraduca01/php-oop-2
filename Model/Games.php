<?php 

include __DIR__ . '/Product.php';

class Games extends Product 
{
    public string $title;
    public string $poster;

    public function __construct($title, $poster, $quantity, $price) 
    {
        parent::__construct($price, $quantity);
        $this->title = $title;
        $this->poster = $poster;
    }

    function printGames(){
        $title = $this->title;
        $poster = $this->poster;
        $price = $this->price;
        $quantity = $this->quantity;
        $content = '';
        $vote = '';
        $overview = '';
        include __DIR__ . '/../View/card.php';
    }

    public static function fetchAll(){
        $gameString = file_get_contents(__DIR__ . '/steam_db.json');
        $gameList = json_decode($gameString, true);
        $games = [];
        foreach($gameList as $item){
            $quantity = rand(0, 100);
            $price = rand(15, 79);
            $games[] = new Games($item['name'], $item['img_icon_url'], $quantity, $price);
        }
        return $games;
    }
}

?>