<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        // extract values from the $_POST array
        var_dump($_POST);
        // var_dump($_FILES); 
        

        $itemsname =  $_POST['itemsname'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $sellersname = $_POST['sellersname'];
        $sellerscontact = $_POST['sellerscontact'];
        $dot = $_POST['dot'];

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

        // call function to insert and track if succes or not 
        $isSuccess = $crud->insertItem($itemsname, $price, $quantity, $description, $sellersname, $sellerscontact, $dot, $namaFileBaru);

        if ($isSuccess) {
            include 'includes/success_message.php';
        } else { 
            include 'includes/error_message.php';
        }
    }
?>
    
    <!-- This prints out values that were passed to the action page using method="get" -->
    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'];  ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];  ?>    
            </h6>
            <p class="card-text">
                Date Of Birth: <?php //echo $_GET['dob'];  ?>
            </p>
            <p class="card-text">
                Email Adress: <?php //echo $_GET['email'];  ?>
            </p>
            <p class="card-text">
                Contact Number: <?php //echo $_GET['phone'];  ?>
            </p>
    
        </div>
    </div> -->

    <!-- This prints out values that were passed to the action page using method="post" -->
    
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No. </th>
            <th scope="col">Items Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Sellers Name</th>
            <th scope="col">Sellers Contact</th>
            <th scope="col">Transactions Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td><?= $_POST['itemsname']?></td>
            <td><?= $_POST['price']?></td>
            <td><?= $_POST['quantity']?></td>
            <td><?= $_POST['description']?></td>
            <td><?= $_POST['sellersname']?></td>
            <td><?= $_POST['sellerscontact']?></td>
            <td><?= $_POST['dot']?></td>
            </tr>
        </tbody>
    </table>

<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>