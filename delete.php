<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        // Jika tidak ada session login maka user akan dikembalikan ke halaman login
        // if user has not login, head back to login page
        header("Location: login.php");
        exit;
    }

    require_once 'db/conn.php';

    if(!$_GET['id']){
        include 'includes/error_message.php';
        header("Location: viewitems.php");
    } else {
        $id = $_GET['id'];
        $result = $crud->deleteItems($id);
        if($result){
            header("Location: viewitems.php");
        } else {
            include 'includes/error_message.php';
        }
    }
?>