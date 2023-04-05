<?php
   ob_start();
    session_start();
     ob_end_clean();
    if(isset($_SESSION["username"])){
    echo "BERHASIL";
    echo "<a href='log_out.php'>Logout</a>";
    }else{
        echo header("location:form_login.php");
    }
?>