<?php
    $title = 'Index'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>
    <h1 class="text-center">Items Registrations</h1>

    <form method="post" action="success.php">
        <!-- itemsname
            quantity
            description
            date of transaction
            price
            seller contact
            seller from
    -->
        <div class="form-group">
            <label for="itemsname">Items Name</label>
            <input required type="text" class="form-control" id="itemsname" name="itemsname">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input required type="text" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input required type="text" class="form-control" id="quantity" name="quantity">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input required type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="sellersname">Sellers Name</label>
            <input required type="text" class="form-control" id="sellersname" name="sellersname">
        </div>
        <div class="form-group">
            <label for="sellerscontact">Sellers Contact</label>
            <input required type="text" class="form-control" id="sellerscontact" name="sellerscontact">
        </div>
        <div class="form-group">
            <label for="dot">Date Of Transaction</label>
            <input type="text" class="form-control" id="dot" name="dot">
        </div>
        <br/>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>