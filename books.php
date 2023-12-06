<?php 

include __DIR__ . '/Model/Books.php';
$books = Books::fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>PHP OOP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <div class="d-flex justify-content-center">
                <img src="https://media.tenor.com/IyweQyb3MhIAAAAi/the-rock-sus.gif" alt="The Rock">
            </div>
            <nav class="w-100 p-3 bg-secondary">
                <ul class="list-unstyled d-flex justify-content-between my-3 container align-items-center">
                    <li><a class="text-white text-decoration-none fs-2" href="index.php">Movies</a></li>
                    <li><a class="text-white text-decoration-none fs-2" href="books.php">Books</a></li>
                    <li><a class="text-white text-decoration-none fs-2" href="games.php">Games</a></li>
                </ul>
            </nav>
        </header>
        <main class="container py-5">
            <div class="row gy-5">
                <?php foreach($books as $book){
                    $book->createCard($book->printBooks());
                    
                } ?>
            </div>
        </main>
        <footer>

        </footer>
    </body>

</html>