<html>
    <style>
        .titles { 
            font-family: Poppins;
            font-size: 36px;
            font-style: normal;
            font-weight: 600;
            line-height: 54px;
            letter-spacing: 0em;
            text-align: left;
            color: #069120;

        }

        .register-form > input{
            width: 487px;
            border: none;
            border-radius: 4px;
            height: 45px;
        }

        .register-form label {
            text-align: left;
        }

        .btn-green { 
            background: #069120 !important;
            width: 100%;
            color: #fff !important;
        }
    </style>
</html>

<?php
    $title = 'Login'; 

    require 'functions.php';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    // Mengecek apakah tombol submit sudah ditekan apa belum
    if(isset($_POST["login"])) {

        // Menangkap data username dan password dari form
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users 
        WHERE username = '$username'");

        // cek username 
        // menghitung berapa baris yang dikemmbalikan query result
        if(mysqli_num_rows($result) === 1) {
            // check password
            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row["password"])) {
                header("Location: index.php");
                exit;
            } 
            
        } 
        // jika username tidak ditemukkan
        $error = true;

    }

?>

<div style="max-width: 487px; margin: 0 auto;">
    <h1 class="titles">Login</h1>
    
    <?php if(isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
            Username / password salah
        </div>
    <?php endif?>
    <form action="" method="post">            
        <div class="form-group register-form">
            <label for="username">Username: </label><br>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-group register-form">
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password">
        </div>
        
        
        <button type="submit" name="login" class="btn btn-green">Log In</button>
    </form>
    <p class="text-center">Don't have an account? <a href="http://">Register</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>