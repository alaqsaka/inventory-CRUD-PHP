<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        // Jika tidak ada session login maka user akan dikembalikan ke halaman login
        // if user has not login, head back to login page
        header("Location: login.php");
        exit;
    }

    $title = 'Items Registrations'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getLatestItemsRegistered();

    
?>
    <div class="row">
        <a href="logout.php">Log out</a>
        <div class="col-sm first-column">
            <div>
                <h1 class="title">Items Registrations</h1>
                <p class="sub-title">
                In this page, we can add items that have been purchased. please enter according to what is in the transaction and according to the correct data type.
                </p>
            </div>
            <div>
            <form action="success.php" method="post" enctype="multipart/form-data">
                <button type="submit" name="submit" class="btn btn-block submit-btn">Submit</button>
               
            </div>
            
        </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="itemsname">Items Name</label>
                    <input required type="text" class="form-control" id="itemsname" name="itemsname" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input required type="text" class="form-control" id="price" name="price" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input required type="text" class="form-control" id="quantity" name="quantity" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="dot">Date Of Transaction</label>
                    <input type="text" class="form-control" id="dot" name="dot" autocomplete="off">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input required type="text" class="form-control" id="description" name="description" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="sellersname">Sellers Name</label>
                    <input required type="text" class="form-control" id="sellersname" name="sellersname" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="sellerscontact">Sellers Contact</label>
                    <input required type="text" class="form-control" id="sellerscontact" name="sellerscontact" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="gambar">Bukti Bayar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" autocomplete="off">
                </div>
            </div>

    </div>
    </form>
    

    <div class="row mt-4 recent">
        <div>
            <h1 class="title">Last Item Registered</h1>
        </div>
        <div>
        <a href="viewitems.php" class="btn btn-block submit-btn" style="width: 181px;height: 30px;font-size: 14px; padding: 0px; margin-top: 0px !important;">View All Items</a>
        </div>
    </div>
    
    <div class="row">
        <!-- Get 2 recent data from database -->
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="card mt-2" style="width: 100%; display: flex; flex-direction: column;">
                    <div class="card-body">
                        <div class="row">
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Items Name</h6>
                                    <p class="card-text"><?php echo $r['itemsname'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Price</h6>
                                    <p class="card-text"><?php echo $r['price'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Quantity</h6>
                                    <p class="card-text"><?php echo $r['quantity'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Description</h6>
                                    <p class="card-text"><?php echo $r['description'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Seller Name</h6>
                                    <p class="card-text"><?php echo $r['sellersname'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Seller Contact</h6>
                                    <p class="card-text"><?php echo $r['sellerscontact'] ?></p>
                                </div>
                                <div class="col">
                                    <h6 class="card-title" style="color: #069120;">Transactions Date</h6>
                                    <p class="card-text"><?php echo $r['dateoftransaction'] ?></p>
                                </div>
                        </div>
                </div>
        </div>
        <?php }?>
       
    </div>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>