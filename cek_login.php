<?php

    session_start();
    
require "config.php";

$nisn = $username = $password ="";
$nisn_err = $username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    if(empty(trim($_POST["nisn"]))){
        $nisn_err = "masukan nisn";
    }else{
        $nisn = trim($_POST["nisn"]);
    }

    if(empty(trim($_POST["username"]))){
        $username_err = "masukan nama";
    }else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "masukan password";
    }else{
        $password = trim($_POST["password"]);
    }
    
  
    if(empty($nisn_err) && empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, nisn, username, hasil, pass, level FROM user WHERE nisn = ?";
        
        if($stmt = mysqli_prepare($koneksi, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_nisn);
            
            $param_nisn = $nisn;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }

            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id, $nisn, $username, $hasil, $hashed_password, $level);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        if($level=="user"){
                            session_start();
                            $_SESSION["level"] = 'user';
                            $_SESSION["nisn"] = $nisn;
                            $_SESSION["username"] = $username;
                            header("location: user.php");
                        }else if($level=="admin") {
                            session_start();
                            $_SESSION["level"] = 'admin';
                            $_SESSION["nisn"] = $nisn;
                            $_SESSION["username"] = $username;
                            header("location: admin.php");
                        }
                        
                    }else{
                        $password_err = "password salah";
                    }  
                } 
            }else{
                $nisn_err = "nisn salah";
            }
        }else{
            echo "UPS! eror";
        }		
    }
    mysqli_close($koneksi);
}
?>
