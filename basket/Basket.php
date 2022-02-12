<?php

class Basket
{
    public $total = 0;
    public $numberOfItems;

    public static function addToBasketButton($productId)
    {
        if (isset($_SESSION['basket'][$productId])) {
            $id = 0;
            $label = "Usuń z koszyka";
        } else {
            $id = 1;
            $label = "Dodaj do koszyka";
        }

        $out = "<a href=\"#\" class=\"btn btn-primary\"";
        $out .= $id == 0 ? " red" : null;
        $out .= "\" rel=\"";
        $out .= $productId . "_" . $id;
        $out .= "\">$label</a>";
        return $out;
    }

    public static function removeFromBasket($id)
    {
        if (!empty($id)) {
            if (isset($_SESSION['basket'][$id])) {
                return "<a href=\"#\" class=\"text-muted\" rel=" . $id . "><i class=\"fas fa-times\"></i></a>";
            }
        }
        return null;
    }

}