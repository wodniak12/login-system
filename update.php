<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

if(isset($_POST['id']) && isset($_POST['imie']) && isset($_POST['opis'])){
    $id = $_POST['id'];
    $imie = $_POST['imie'];
    $opis = $_POST['opis'];

    $sql = "UPDATE `podanie` SET `imie`='$imie', `Opis`='$opis' WHERE `id`='$id';";
    $result = $conn->query($sql);

    if ($result) {
        header('location:user_page.php');
        exit;
    } else {
        echo "Błąd zapisu danych.";
        exit;
    }
} else {
    echo "Nie podano wszystkich wymaganych danych.";
    exit;
}

?>
