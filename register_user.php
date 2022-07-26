<?php
    
    require "config.php";
    
    $nisn = $username = $password = "";
    $nisn_err = $username_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty(trim($_POST["nisn"]))){
            $nisn_err = "masukan nisn";
        }else{
            $sql = "SELECT nisn FROM user WHERE nisn = ?";
            
            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_nisn);
                
                $param_nisn = trim($_POST["nisn"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $nisn_err = "nisn sudah ada";
                    }else{
                        $nisn = trim($_POST["nisn"]);
                    }
                }else{
                    echo "Ups! gagal";
                }
            }
        }

        if(empty(trim($_POST["username"]))){
            $username_err = "masukan username";
        }else{
            $sql = "SELECT username FROM user WHERE username = ?";
            
            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "username sudah ada";
                    }else{
                        $username = trim($_POST["username"]);
                    }
                }else{
                    echo "Ups! gagal";
                }
            }
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "masukan password";
        }elseif(strlen(trim($_POST["password"])) < 4){
            $password_err = "password minimal 4 karakter";
        } else{
            $password = trim($_POST["password"]);
        }
        
        
        if(empty($username_err) && empty($nisn_err) && empty($password_err)){
            
            $sql = "INSERT INTO user (nisn, username, pass) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($koneksi, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_nisn, $param_username, $param_password);
                
                $param_nisn = $nisn;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                
                
                if(mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                }else{
                    echo "gagal registrasi";
                }
            }
        }
        
        mysqli_close($koneksi);
        
    }
    
?>