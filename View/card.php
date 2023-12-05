<div class="col-12 col-md-4 col-lg-3">
    <div class="card">
        <img class="w-100" src="<?= $poster ?>" alt="<?= $title ?>">
        <div class="card-body">
            <h5 class="card-title">
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $overview ?>
            </p>
            <div class="d-flex justify-content-between align-items-flex-start">
                <?= $vote ?>
            </div>
            <div>
                <?= $content ?>
            </div>
            <div>
                Amount: <?= $quantity ?>
                Price: <?= $price ?> €
            </div>
        </div>
    </div>
    
</div>