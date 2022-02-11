<?php
global $mysqli;
$session = Utils::getSession("basket");
$basket = new Basket();
$out = array();
if (!empty($session)) {
    $catalogue = new ProductsCatalogue();
    foreach ($session as $key => $value) {
        $out[$key] = $catalogue->getProduct($value, $mysqli);
    }
}
$mysqli->close();
?>

<div class="col-md-4" id="basket_view">
    <div data-reflow-type="shopping-cart">
        <div class="reflow-shopping-cart">
            <div class="ref-loading-overlay"></div>
            <div class="ref-message" style="display: none;"></div>
            <div class="ref-cart" style="display: block;">
                <div class="ref-heading"><br>Koszyk</div>
                <div class="ref-th">
                    <div class="ref-product-col">Produkt</div>
                    <div class="ref-price-col">Cena</div>
                    <div class="ref-price-col">Usuń</div>
                </div>
                <?php if (!empty($out)) { ?>
                    <?php foreach ($out as $item) { ?>
                        <div class="ref-cart-table">
                            <div class="ref-product">
                                <img class="ref-product-photo"
                                     src="<?php echo "/images/" . $item->image . ".jpg" ?>"
                                <div class="col-form-label">
                                    <span><?php echo $item->price . "&nbsp" . $item->currency ?></span>
                                </div>
                                <i class="fas fa-trash-alt d-xl-flex justify-content-xl-end align-items-xl-center"></i>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>

                    <p>Twój koszyk jest pusty</p>
                <?php } ?>
                <div class="ref-footer">
                    <div class="ref-links"><a href="https://google.com" target="_blank">Warunki i </a><a
                                href="https://google.com" target="_blank">zwroty</a></div>
                    <div class="ref-totals">
                        <div class="ref-total">
                            <span><?php echo "W sumie: " . $basket->total . "&nbsp" . $basket->currency ?></span>
                        </div>
                    </div>
                    <div class="ref-button ref-checkout-button">Zapłać</div>
                </div>
            </div>
        </div>
    </div>
</div>
