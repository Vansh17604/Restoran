<?php 

        if(isset($_SESSION['customer']))
        {
            $email = $_SESSION['customer'];

        }
        else
        {
            header("location:login.php");
        }
    
?>