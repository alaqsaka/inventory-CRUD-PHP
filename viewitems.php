<?php
    $title = 'Items Lists'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require 'db/functions.php';

    $results = $crud->getItems();

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
            <th colspan="7" class="title-head">Items Registred</th>
        </tr>
        <tr>
            <th scope="col">No. Transaction</th>
            <th scope="col">Items Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Transactions Date</th>
            <th>Actions</th>
        </tr>
        <!-- <tr>
            <td>1</td>
            <td>Nescafe</td>
            <td>23,500</td>
            <td>5</td>
            <td>Bubuk Kopi</td>
            <td>Tokopedia</td>
            <td>0218412124213</td>
            <td>2/15/20022</td>
        </tr> -->
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
                        <a class="btn btn-primary" href="view.php?id=<?php echo $r['item_id'] ?>">View Details</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $r['item_id'] ?>">Edit Details</a>
                        <a onclick="return confirm('Are u sure u want to delete this items?');" class="btn btn-danger" href="delete.php?id=<?php echo $r['item_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php $i++;?>
            <?php endforeach;?>
        <?php } else {
        ?>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['item_id'] ?></td>
                    <td><?php echo $r['itemsname'] ?></td>
                    <td><?php echo $r['price'] ?></td>
                    <td><?php echo $r['quantity'] ?></td>
                    <td><?php echo $r['dateoftransaction'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="view.php?id=<?php echo $r['item_id'] ?>">View Details</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $r['item_id'] ?>">Edit Details</a>
                        <a onclick="return confirm('Are u sure u want to delete this items?');" class="btn btn-danger" href="delete.php?id=<?php echo $r['item_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
            
        <?php }?>
        
        
    </table>

<?php require_once 'includes/footer.php'; ?>