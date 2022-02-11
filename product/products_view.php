<?php
global $mysqli;
$productsList = new ProductsCatalogue();
$products = $productsList->getProducts($mysqli);
$mysqli->close();
?>
<div class="container-fluid">
    <div class="card-group">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($products as $product) { ?>
                <form method="post" action="/welcome_page/welcome_page.php?action=add&id=<?php echo $product->id ?>"
                      name="postData">
                    <div class="col">
                        <div class="card">
                            <img src="<?php echo "/images/" . $product->image . ".jpg" ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->price . "&nbsp" . $product->currency ?></h5>
                                <p class="card-text"><?php echo $product->description ?></p>
                                <div class="d-flex justify-content-center">
                                    <?php echo Basket::addToBasketButton($product->id) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>


