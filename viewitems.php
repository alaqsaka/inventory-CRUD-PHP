<?php
    session_start();
    
    if(!isset($_SESSION["login"])) {
        // Jika tidak ada session login maka user akan dikembalikan ke halaman login
        // if user has not login, head back to login page
        header("Location: login.php");
        exit;
    }

    $title = 'Items Lists'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require 'db/functions.php';

    // pagination configuration 
    $jumlahDataPerHalaman = 4;
    // $results = mysqli_query($conn, "SELECT * FROM inventory");
    // $jumlahData = mysqli_num_rows($results);
    // var_dump($jumlahData);
    $jumlahData = count(query("SELECT * FROM inventory"));
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);

    // conditinal for checking is there page query in url 
    // jika ada page di url pakai angka yang ada di page, jika tidak gunakan angka 1
    $halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;
    
    // var_dump($halamanAktif);

    // var_dump($jumlahHalaman);

    $results = mysqli_query($conn, "SELECT * FROM inventory LIMIT $awalData, $jumlahDataPerHalaman");

    if(isset($_POST["search"])) {
        $results = search($_POST["keyword"]);
    } else {
        
    }

?>
    <!-- Search feature -->
    <form action="" method="post" class="mb-2">
        
        <input type="text" name="keyword" class="form-control" autofocus autocomplete="off"placeholder="Search Items Here">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-light table-bordered" style="border: 1px solid #E5E5E5 !important;">
        <tr>
            <th colspan="7" class="title-head">Items Registered</th>
        </tr>
        <tr>
            <th scope="col">No. Transaction</th>
            <th scope="col">Items Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Transactions Date</th>
            <th>Actions</th>
        </tr>
        <?php 
            if(isset($_POST["search"])) {
            ?>
            <?php $i =1; ?>
            <?php foreach($results as $r) :?>
                <tr>
                <td><?php echo $r['item_id'] ?></td>
                    <td><?php echo $r['itemsname'] ?></td>
                    <td><?php echo $r['price'] ?></td>
                    <td><?php echo $r['quantity'] ?></td>
                    <td><?php echo $r['dateoftransaction'] ?></td>
                    <td>
                        <a class="btn" href="view.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector.svg" alt=""></a>
                        <a class="btn" href="edit.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector-1.svg" alt=""></a>
                        <a onclick="return confirm('Are u sure u want to delete this items?');" class="btn" href="delete.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector-2.svg" alt=""></a>
                    </td>
                </tr>
            <?php $i++;?>
            <?php endforeach;?>
        <?php } else {
        ?>
            <?php foreach($results as $r) { ?>
                <tr>
                    <td><?php echo $r['item_id'] ?></td>
                    <td><?php echo $r['itemsname'] ?></td>
                    <td><?php echo $r['price'] ?></td>
                    <td><?php echo $r['quantity'] ?></td>
                    <td><?php echo $r['dateoftransaction'] ?></td>
                    <td>
                        <a class="btn" href="view.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector.svg" alt=""></a>
                        <a class="btn" href="edit.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector-1.svg" alt=""></a>
                        <a onclick="return confirm('Are u sure u want to delete this items?');" class="btn" href="delete.php?id=<?php echo $r['item_id'] ?>"><img src="public/icons/Vector-2.svg" alt=""></a>
                    </td>
                </tr>
            <?php }?>
            
        <?php }?>
        
        
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if($halamanAktif >1) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif-1; ?>"">Previous</a></li>
            <?php else :?>
                <li class="page-item disabled"><a class="page-link" href="?page=<?= $halamanAktif-1; ?>"">Previous</a></li>
            <?php endif;?>
            
            <?php for($i = 1; $i<= $jumlahHalaman; $i++) : ?>
                
                <?php if($i == $halamanAktif) : ?>
                    
                    <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?php echo $i?></a></li>
                <?php else :?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?php echo $i?></a></li>
                <?php endif?>
            <?php endfor; ?>

            <?php if($halamanAktif == $jumlahHalaman) : ?>
                <li class="page-item disabled"><a class="page-link" href="?page=<?= $halamanAktif+1; ?>"">Next</a></li>
            <?php else :?>
                <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif+1; ?>"">Next</a></li>
            <?php endif;?>
        </ul>
    </nav>

<?php require_once 'includes/footer.php'; ?>