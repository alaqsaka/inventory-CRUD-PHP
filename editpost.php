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
        $gambarLama = $_POST['gambarLama'];
        $gambar = $_POST['gambar'];

        if($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            //upload gambar
            $namaFile = $_FILES['gambar']['name'];
            $ukuranFile = $_FILES['gambar']['size'];
            $error = $_FILES['gambar']['error'];
            $tmpName = $_FILES['gambar']['tmp_name'];

            // cek apakah ada gambar yang diupload
            if($error === 4){
                echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
                return false;   
            }

            // cek apakah yang diupload adalah gambar
            $isGambar = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar, $isGambar)){
                echo "<script>
                alert('Only JPG, JPEG, OR PNG');
                </script>";
                return false; 
            }

            // cek jika ukurannya terlalu besar
            if($ukuranFile>1000000){
                echo "<script>
                alert('ukuran gambar terlalu besar');
                </script>";
            }

            // lolos pengecekan, gambar siap diupload
            $namaFileBaru = uniqid();
            $namaFileBaru.= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

            if($namaFileBaru) {
                echo "<script>
                alert('data berhasil ditambahkan');
                </script>";
            } else { 
                echo "<script>
                alert('data gagal ditamahkan. periksa foto kembali');
                </script>";
            }
            $gambar=$namaFileBaru;
        }

        // Call crud function 
        $results = $crud->editItems($id,$itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot, $gambar);

        if($results) {
            // Redirect to index.php
            header("Location: index.php");
        }  else {
            echo $results;
            include 'includes/error_message.php';
        }
    }

    else {
        header("Location: viewitems.php");
        include 'includes/error_message.php';
    }   

?>