<?php
    $title = 'Items Lists'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getItems();
?>
    <h1>Items Lists</h1>
    <table class="table table-bordered">
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
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $r['item_id'] ?></td>
                <td><?php echo $r['itemsname'] ?></td>
                <td><?php echo $r['price'] ?></td>
                <td><?php echo $r['quantity'] ?></td>
                <td><?php echo $r['description'] ?></td>
                <td><?php echo $r['sellersname'] ?></td>
                <td><?php echo $r['sellerscontact'] ?></td>
                <td><?php echo $r['dateoftransaction'] ?></td>
            </tr>
        <?php }?>
    </table>

<?php require_once 'includes/footer.php'; ?>