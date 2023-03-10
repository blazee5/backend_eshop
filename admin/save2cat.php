<?php
	// подключение библиотек
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";

    $title = htmlspecialchars($_POST['title'] ?? '');
    $author = htmlspecialchars($_POST['author'] ?? '');
    $pubyear = $_POST['pubyear'];
    $price = $_POST['price'];

    if (!addItemToCatalog($title, $author, $pubyear, $price)) {
        echo 'Произошла ошибка при добавлении товара';
    } else {
        header("Location: add2cat.php");
        exit;
    }