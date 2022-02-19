<?php 
    require_once 'db/conn.php';  
    // Get values from post operation 
    if(isset($_POST['submit'])){
        // extract values from the $_POST array
        $id = $_POST['id'];
        $itemsname =  $_POST['itemsname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $sellersname = $_POST['sellersname'];
        $sellerscontact = $_POST['sellerscontact'];
        $dot = $_POST['dot'];

        // Call crud function 
        $results = $crud->editItems($id,$itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot);

        if($results) {
            // Redirect to index.php
            header("Location: index.php");
        }  else {
            echo $results;
            echo "Error";
        }
    }

    else {
        echo "Error";
    }   

?>