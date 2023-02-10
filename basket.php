<?php
// подключение библиотек
require "inc/lib.inc.php";
require "inc/config.inc.php";
global $basket;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Корзина пользователя</title>
</head>
<body>
<h1>Ваша корзина</h1>
<?php
if (count($basket) == 1) {
  echo "Корзина пуста! Вернитесь в " . "<a href='catalog.php'>каталог.</a>";
} else {
  echo "Вернуться в " . "<a href='catalog.php'>каталог.</a>";
  $arr = myBasket();
  $i = 1;
  $sum = 0;
}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
  <tr>
    <th>N п/п</th>
    <th>Название</th>
    <th>Автор</th>
    <th>Год издания</th>
    <th>Цена, руб.</th>
    <th>Количество</th>
    <th>Удалить</th>
  </tr>
  <?php
  if (count($basket) > 1) {
  foreach ($arr as $item) {
    $id = $item['id'];
    $sum += $item['price'] * $basket[$id];
    $i++;
    ?>
    <tr>
      <td><?= $id ?></td>
      <td><?= $item['title'] ?></td>
      <td><?= $item['author'] ?></td>
      <td><?= $item['pubyear'] ?></td>
      <td><?= $item['price'] ?></td>
      <td><?= $basket[$id] ?></td>
      <td><a href="delete_from_basket.php?id=<?= $item['id'] ?>">Удалить</a></td>
    </tr>
  <?php }
  }
  ?>
</table>

<p>Всего товаров в корзине на сумму: <?php
  if (count($basket) > 1) {
    echo $sum;
  }
  ?> руб.</p>

<div align="center">
  <input type="button" value="Оформить заказ!"
         onClick="location.href='orderform.php'"/>
</div>

</body>
</html>







