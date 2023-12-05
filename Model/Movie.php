<?php 

include __DIR__ . '/Genre.php';
include __DIR__ . '/Product.php';

class Movie extends Product
{
    private $id;
    private $title;
    private $overview;
    private $vote_average;
    private $poster_path;

    private array $genres;



    function __construct($id, $title, $overview, $vote_average, $poster_path, $genres, $quantity, $price)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote_average;
        $this->poster_path = $poster_path;
        $this->genres = $genres;
    }
    private function printGenres()
    {
        $template = "<p>";
        for($n = 1; $n < count($this->genres); $n++){
            $template .= $this->genres[$n]->drawGenre();
        }
        $template .= "</p>";
        return $template;
    }

    function printMovies()
    {
        $this->setDiscount($this->title);
        $id = $this->id;
        $title = $this->title;
        $overview = strlen($this->title) > 28 ? substr($this->title, 0, 28) . '...' : $this->title;
        $vote = $this->printStars();
        $poster = $this->poster_path;
        $genre = $this->printGenres();
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . '/../View/card.php';
    }

    function printStars()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p class='m-0'>";
        for($n = 1; $n <= 5; $n++){
            $template .= $n <= $vote ? '<i class="fa-solid text-warning fa-star"></i>' : '<i class="fa-regular text-warning fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }

    public static function fetchAll()
    {
        $movieString = file_get_contents(__DIR__ . '/movie_db.json');

        $movieList = json_decode($movieString, true);
        
        $movies = [];

        $genres = Genre::fetchAll();

        foreach($movieList as $item){
            $movieGenres = [];

            for($n = 1; $n <= count($item['genre_ids']); $n++){
                $index = rand(0, count($genres) - 1);
                $randGenre = $genres[$index];
                $movieGenres[] = $randGenre;
            
            }
            $quantity = rand(0, 100);
            $price = rand(15, 79);

            $movies[] = new Movie($item['id'], $item['title'], $item['overview'], $item['vote_average'], $item['poster_path'], $movieGenres, $quantity, $price);
        }

        return $movies;
    }    
}

?>