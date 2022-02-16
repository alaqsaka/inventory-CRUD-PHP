<?php 
    // Get values from post operation 
    // Call crud function 
    // Redirect to index.php

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

    }

    else {
        
    }

?>