<?php
global $mysqli;
$session = Utils::getSession("basket");
$basket = new Basket();
$out = array();
if (!empty($session)) {
    $catalogue = new ProductsCatalogue();
    foreach ($session as $key => $value) {
        $out[$key] = $catalogue->getProduct($value, $mysqli);
        $basket->numberOfItems++;
        $basket->total += doubleval($out[$key]->price);
    }
}
$info = '';
$mysqli->close();
?>

<section class="h-100 h-custom bg-light">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Koszyk</h1>
                                        <h6 class="mb-0 text-muted"><?php echo "Liczba produktów w koszyku: " . $basket->numberOfItems ?></h6>
                                    </div>
                                    <hr class="my-4">
                                    <?php if (!empty($out)) { ?>
                                        <?php foreach ($out as $item) { ?>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                            src="<?php echo "/images/" . $item->image . ".jpg" ?>"
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted"><?php echo $item->description ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0"><?php echo $item->price . " " . $item->currency ?></h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <?php echo Basket::removeFromBasket($item->id) ?>
                                                </div>
                                            </div>

                                            <hr class="my-4">
                                        <?php } ?>
                                    <?php } else { ?>
                                        <p>Twój koszyk jest pusty</p>
                                    <?php } ?>

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/welcome_page/welcome_page.php" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Powrót do sklepu</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Podsumowanie</h3>
                                    <hr class="my-4">

                                    <?php if (!empty($out)) { ?>
                                        <?php foreach ($out as $item) { ?>
                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">1</h5>
                                                <h5><?php echo $item->price . " " . $item->currency ?></h5>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Suma</h5>
                                        <h5><?php echo number_format($basket->total, 2) . " " . $item->currency ?></h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Zapłać:)
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
