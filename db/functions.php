<?php 
// koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventory_db");
    
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);

        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
    
    
    function search($keyword){
        $query = "SELECT * from inventory 
                WHERE itemsname LIKE '%$keyword%'";

        return query($query);
    }
?>