<?php

include("connect.php");

function redirect($url) {
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}

global $conn;

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $image = $_POST["image"];
    $price = $_POST["price"];

    $query = "INSERT INTO tbl_product (name, image, price) VALUES ('$name', '$image', '$price')";
    $result = $conn->prepare($query);
    $result->execute();

    redirect("../admin/admin.php");
}
