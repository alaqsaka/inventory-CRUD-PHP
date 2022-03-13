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
    $title = 'Account Registrations'; 

    require 'functions.php';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
    if(isset($_POST['register'])) {
        if(registrasi($_POST) > 0) {
            echo "<script>
                alert('success create account');
            </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<div style="max-width: 487px; margin: 0 auto;">
    <h1 class="titles">Create Your Free Account</h1>
    <form action="" method="post">            
        <div class="form-group register-form">
            <label for="username">Username: </label><br>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-group register-form">
            <label for="password">Password: </label><br>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group register-form">
            <label for="confirmPassword">Confirmation Password </label><br>
            <input type="password" name="confirmPassword" id="confirmPassword">
        </div>
        
        <button type="submit" name="register" class="btn btn-green">Create new account</button>
    </form>
    <p class="text-center">Already have account? <a href="http://">Log In</a></p>
</div>
       
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>