var basketObject = {

    removeFromBasket: function (obj) {
        obj.on('click', function () {
            var item = $(this).attr('rel');
            jQuery.post('http://192.168.1.145/basket/basket_remove.php', {id: item}, function (data) {
                basketObject.refreshBasket();
            }, 'html');
            return false;
        });
    },

    refreshBasket: function () {
        jQuery.post("http://192.168.1.145/basket/basket_file.php", function (data) {
            $('#basket_view').html(data);
        }, 'html');
    },

    addToBasket: function (obj) {
        obj.on('click', function () {
            var buttonLink = $(this);
            var param = buttonLink.attr("rel");
            var item = param.split("_");
            jQuery.post("http://192.168.1.145/basket/basket_add.php", {
                itemId: item[0],
                addOrRemove: item[1]
            }, function (data) {
                var new_id = item[0] + '_' + data.addOrRemove;
                if (data.addOrRemove !== item[1]) {
                    if (data.addOrRemove === 0) {
                        buttonLink.attr("rel", new_id);
                        buttonLink.text("Usuń z koszyka");
                    } else {
                        buttonLink.attr("rel", new_id);
                        buttonLink.text("Dodaj do koszyka");
                    }
                }
            }, 'json');
            return false;
        });
    },

    createOrder: function (obj) {
        obj.on('click', function () {
            var buttonLink = $(this);
            jQuery.post("http://192.168.1.145/basket/create_order.php", {
            }, function () {
                alert("Zamówienie zostało przyjęte");
            }, 'json');
            return false;
        });
    }
};
$(document).ready(function () {
    basketObject.removeFromBasket($(".text-muted"));
    basketObject.addToBasket($(".btn"));
    basketObject.createOrder($(".pay"));

});