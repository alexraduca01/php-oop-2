<?php 

include __DIR__ . '/Product.php';

class Books extends Product
{
    public string $title;
    public string $overview;
    public string $poster;
    public array $content;

    public function __construct($title, $overview, $poster, $content, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->title = $title;
        $this->overview = $overview;
        $this->poster = $poster;
        $this->content = $content;
    }

    private function printAuthors()
    {
        $template = "<p>";
        for($n = 0; $n < count($this->content); $n++){
            $template .= $this->content[$n] . ', ';
        }
        $template .= "</p>";
        return $template;
    }

    function printBooks(){

        $this->createDiscount(rand(15, 85));

        $cardContent = [
            'title' => $this->title,
            'overview' => strlen($this->overview) > 28 ? substr($this->overview, 0, 28) . '...' : $this->overview,
            'poster' => $this->poster,
            'content' => $this->printAuthors(),
            'vote' => '',
            'price' => $this->price,
            'quantity' => $this->quantity,
            'discount' => $this->setDiscount(),
        ];
        return $cardContent;
    }

    public static function fetchAll(){
        $bookString = file_get_contents(__DIR__ . '/books_db.json');

        $bookList = json_decode($bookString, true);
        
        $books = [];

        foreach($bookList as $item){
            $quantity = rand(0, 100);
            $price = rand(15, 79);

            $books[] = new Books($item['title'], $item['longDescription'], $item['thumbnailUrl'], $item['authors'], $quantity, $price);
        }

        return $books;
    }
}

?>