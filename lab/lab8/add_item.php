<?php
session_start();

    
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    
    if(!in_array($_GET['itemId'], $_SESSION['cart'])){
        $_SESSION['cart'][] = $_GET['itemId'];
    }
    
    echo "added";

?>