<?php
$DB_HOST = 'localhost';
$DB_LOGIN = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'eshop';
$ORDERS_LOG = 'orders.log';
$basket = [];
$count = 0;
$con = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME);
if (!con) {
    echo 'Ошибка: '
            . mysqli_connect_errno()
            . ':'
            . mysqli_connect_error();
}