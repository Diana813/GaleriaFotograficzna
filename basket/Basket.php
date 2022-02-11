<?php

class Basket
{
    public $total = 0;
    public $currency = "pln";
    private bool $isBasketEmpty;

    public function __construct()
    {
        $this->isBasketEmpty = empty($_SESSION['basket']) ? true : false;
    }

    public static function addToBasketButton($productId)
    {
        if (isset($_SESSION['basket'][$productId])) {
            $id = 0;
            $label = "Usuń z koszyka";
        } else {
            $id = 1;
            $label = "Dodaj do koszyka";
        }

        $out = "<a href=\"#\" class=\"ref-button\"";
        $out .= $id == 0 ? " red" : null;
        $out .= "\" rel=\"";
        $out .= $productId . "_" . $id;
        $out .= "\">{$label}</a>";
        return $out;
    }


}