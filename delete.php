<?php 
    require_once 'db/conn.php';

    if(!$_GET['id']){
        include 'includes/error_message.php';
    } else {
        $id = $_GET['id'];
        $result = $crud->deleteItems($id);
        if($result){
            header("Location: viewitems.php");
        } else {
            echo 'Error while deleting items';
        }
    }
?>