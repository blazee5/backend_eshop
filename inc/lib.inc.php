<?php
require "config.inc.php";
function addItemToCatalog($title, $author, $pubyear, $price) {
    $sql = 'INSERT INTO catalog (title, author, pubyear, price) VALUES (?, ?, ?, ?)';
    global $link;
    if (!$stmt = mysqli_prepare($link, $sql)) {
        return false;
    } else {
        mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
}