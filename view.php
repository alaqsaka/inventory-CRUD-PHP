<?php
    $title = 'Item Details'; 

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // Get item by ID
    if(!isset($_GET['id'])){
        include 'includes/error_message.php';
    } else {
        $id = $_GET['id'];
        $result = $crud->getItemDetails($id);
?>

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
                <th scope="row"><?= $result['item_id']?></th>
                <td><?= $result['itemsname']?></td>
                <td><?= $result['price']?></td>
                <td><?= $result['quantity']?></td>
                <td><?= $result['description']?></td>
                <td><?= $result['sellersname']?></td>
                <td><?= $result['sellerscontact']?></td>
                <td><?= $result['dateoftransaction']?></td>
                </tr>
            </tbody>
        </table>

<?php }?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>