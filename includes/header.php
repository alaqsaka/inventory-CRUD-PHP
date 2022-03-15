<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\site.css?v=<?php echo time(); ?>">
    
    <title>Inventory - <?php echo $title ?></title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-style">
        <div class="container-fluid">
          <div class="navbar-logo-div">
            <a class="navbar-logo" href="index.php">Fore's Inventory</a>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php if(isset($_SESSION["login"])) :?>
              <div class="collapse navbar-collapse navbar-items" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Items Registrations</a>
                <a class="nav-link" href="viewitems.php">Items Lists</a>
                <a class="link-danger nav-link text-danger" href="logout.php">Log out</a>
              </div>
            </div>
            
          <?php endif?>
          
        </div>
      </nav>
    <div class="container">
    
    
    <br/>
    <br/>