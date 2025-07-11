<!-- #2 -->
<!-- Create a PHP page that displays a list of products in a cart, shows the quantity and price of each, calculates the total price, and applies a discount if the total is over a certain amount. -->

<!-- Picks 5 random products from a list.

Assigns each product a random price between $1.00 and $10.00.

Assigns a random quantity between 1 and 10.

Applies a 10% discount if subtotal > $10.00 per item.

Displays the cart with a discount column and calculates the final total. -->

<!-- cart.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>List of product</h2>
    <table style="width:50%" border="1">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>SubTotal</th>
            <th>Discount</th>
            <th>Total</th>
        </tr>
    <?php
    $products = [
        'Laptop',
        'Smartphone',
        'Headphones',
        'Keyboard',
        'Mouse'
    ];
    $final_total = 0;
    for ($i = 0; $i < count($products); $i++) {
        $price = rand(100, 1000) / 100;
        $quantity = rand(1, 10);
        $subtotal = $price * $quantity;
        $discount = $subtotal > 10 ? $subtotal * 0.1 : 0;
        $total = $subtotal - $discount;
        $final_total += $total;
        echo "<tr>
                    <td>{$products[$i]}</td>
                    <td>{$price} $</td>
                    <td>{$quantity}</td>
                    <td>{$subtotal}</td>
                    <td>" . number_format($discount, 2) . "</td>
                    <td>" . number_format($total, 2) . "</td>
                </tr>";
    }

    ?>
    
    </table>
    <h3>Total Cart: <?php echo number_format($final_total, 2); ?></h3>
</body>

</html>