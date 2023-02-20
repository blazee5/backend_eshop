<?php
require_once "secure/session.inc.php";
require_once "../inc/lib.inc.php";
require_once "../inc/config.inc.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$orders = getOrders();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Поступившие заказы</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php foreach ($orders as $order) { ?>
    <hr>
    <p><b>Заказ номер</b>: <?= $order["orderid"] ?></p>
    <p><b>Заказчик</b>: <?= $order["name"] ?></p>
    <p><b>Email</b>: <?= $order["email"] ?></p>
    <p><b>Телефон</b>: <?= $order["phone"] ?></p>
    <p><b>Адрес доставки</b>: <?= $order["address"] ?></p>
    <p><b>Дата размещения заказа</b>: <?= date("d-m-Y H:i", $order["date"]) ?></p>

    <h3>Купленные товары:</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="90%">
        <tr>
            <th>N п/п</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Год издания</th>
            <th>Цена, руб.</th>
            <th>Количество</th>
        </tr>
        <?php
        $sum = 0;
        foreach ($order['goods'] as $i => $item) {
            $sum += $item['price'] * $item['quantity'];
            ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['author'] ?></td>
                <td><?= $item['pubyear'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['quantity'] ?></td>
            </tr>
        <?php } ?>
    </table>
    <p>Всего товаров в заказе на сумму: <?= $sum ?> руб.</p>
<?php } ?>
</body>
</html>