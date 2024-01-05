<?php 
    require("config.php");
    if(isset($_GET['email']) && isset($_GET['v_code'])){
        $query = "select * from `users` where `email` = '$_GET[email]' and `verification_code` = '$_GET[v_code]'";
        $result = mysqli_query($conn, $query);

        if($result){
            if(mysqli_num_rows($result) == 1){
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['is_verified'] == 0){
                    $update = "UPDATE `users` SET `is_verified` = '1' WHERE `email` = '$result_fetch[email]'";
                    if(mysqli_query($conn, $update)){
                    echo "<script>alert('Email verified successfully.');
                    window.location.href='http://localhost/ChatApp%20-%20CodingNepal/login.php';</script>";
                    }
                    else{
                    echo "<script>alert('Cannot run query.');</script>";
                    }
                }
                else{
                    echo "<script>alert('Email Already Registered.');
                    window.location.href='http://localhost/ChatApp%20-%20CodingNepal/login.php';</script>";
                }
            }
        }
        else{
            echo "<script>alert('Cannot run query.');</script>";
        }
    }
?>