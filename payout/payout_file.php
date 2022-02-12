<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    .content {
        max-width: 500px;
        margin: auto;
    }
</style>
<body>

<div class="content">
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>


    <div id="paypal-button-container" class="justify-content-center"></div>

    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '77.44'
                        }
                    }]
                });
            },

            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                });
            }
        }).render('#paypal-button-container');

    </script>
</div>
</body>
</html>