<?php
    session_start();

    if(!isset($_SESSION["login"])) {
        // Jika tidak ada session login maka user akan dikembalikan ke halaman login
        // if user has not login, head back to login page
        header("Location: login.php");
        exit;
    }

    $title = 'Edit Items'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(!isset($_GET['id'])) {
        include 'includes/error_message.php';
        header("Location: viewitems.php");
    } else {
        $id = $_GET['id'];
        $items = $crud->getItemDetails($id);
    
?>
    <h1>Edit Items</h1>
    <form method="post" action="editpost.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $items['item_id'] ?>"/>
        <input type="hidden" name="gambarLama" value="<?php echo $items['gambar'] ?>"/>
        <div class="form-group">
            <label for="itemsname">Items Name</label>
            <input required type="text" class="form-control" id="itemsname" name="itemsname" value="<?php echo $items['itemsname']?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input required type="text" class="form-control" id="price" name="price" value="<?php echo $items['price']?>"
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input required type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $items['quantity']?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input required type="text" class="form-control" id="description" name="description" value="<?php echo $items['description']?>">
        </div>
        <div class="form-group">
            <label for="sellersname">Sellers Name</label>
            <input required type="text" class="form-control" id="sellersname" name="sellersname" value="<?php echo $items['sellersname']?>">
        </div>
        <div class="form-group">
            <label for="sellerscontact">Sellers Contact</label>
            <input required type="text" class="form-control" id="sellerscontact" name="sellerscontact" value="<?php echo $items['sellerscontact']?>">
        </div>
        <div class="form-group">
            <label for="dot">Date Of Transaction</label>
            <input type="text" class="form-control" id="dot" name="dot" value="<?php echo $items['dateoftransaction']?>">
        </div>
        <div class="form-group">
            <label for="gambar">Bukti bayar</label><br>
            <img src="img/<?= $items['gambar']?>" alt="" width="350"><br><br>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <br/>
            <a class="btn btn-primary" href="view.php?id=<?php echo $items['item_id'] ?>">Back</a>
            <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </form>

<?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>