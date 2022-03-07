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
        <h1>Registration Page</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username: </label><br>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">Password: </label><br>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="confirmPassword">Confirmation Password </label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                </li>
                <li>
                    <br>
                    <button type="submit" name="register">Create new account</button>
                </li>
            </ul>
        </form>
        <br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>