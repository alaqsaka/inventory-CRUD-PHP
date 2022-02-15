<?php
    $title = 'Success'; 
    require_once 'includes/header.php';
?>
    <div class="alert alert-success" role="alert">
        <h3>Success Adding New Item To Inventory</h3>
    </div>
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