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

    loadingPayPal: function (obj) {
        obj.live('click', function () {
            var token = $(this).attr('id');
            var image = "<div style.css=\"text-align:center\">";
            image = image + "<img src=\"images/loadinfo.net.gif\"";
            image = image + " alt=\"Proceeding to PayPal\" />";
            image = image + "<br />Please wait while we are redirecting you to PayPal...";
            image = image + "</div><div id=\"frm_pp\"></div>";
            $('#big_basket').fadeOut(200, function () {
                $(this).html(image).fadeIn(200, function () {
                    basketObject.send2PayPal(token);
                });
            });
            return false;
        });
    },
    sendToPayPal: function (token) {
        jQuery.post('mod/paypal.php', {token: token}, function (data) {
            $('#frm_pp').html(data);
            // submit form automatically
            $('#frm_paypal').submit();
        }, 'html');
    }
};
$(document).ready(function () {
    basketObject.removeFromBasket($(".text-muted"));
    basketObject.addToBasket($(".btn"));
    // basketObject.loadingPayPal($('.paypal'));

});