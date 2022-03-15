<?php 

    require 'db/functions.php';

    function registrasi($data) {
        global $conn;

        if(strlen($data["username"]) > 0) {
            echo "<script>
                len username > 0 
            </script>";
        } else {
            echo "<script>
                len username == 0
            </script>";
        }
        
        if(strlen($data["password"]) > 0) {
            echo "<script>
                len password> 0 
            </script>";
        } else {
            echo "<script>
                len password == 0
            </script>";
        }

        if(strlen($data["confirmPassword"]) > 0) {
            echo "<script>
                len confirm password > 0 
            </script>";
        } else {
            echo "<script>
                len confirm password == 0
            </script>";
        }

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);

        // if(strlen($username) > 0 && strlen($password) && strlen($confirmPassword)) {

        // } else {
        //     echo "<script>
        //         Field tidak boleh kosong
        //     </script>";
        // }

        
        
        if($password !== $confirmPassword) {
            echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        }

        // cek username sudah ada atau belum 
        $result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)) {
            echo "<script>alert('username sudah terdaftar')</script>";
            return false;
        }

        // enkripsi password terlebih dahulu 
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
    }

?>