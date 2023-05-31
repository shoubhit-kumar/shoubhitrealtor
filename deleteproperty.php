<?php
    require 'connection.php';
?>
<?php
    session_start();
        if (isset($_SESSION["o_id"])) {
            if(!isset($_GET["p_id"])){
                header('location: profile.php');
            }
        }
        else{
            header('location: index.php');
        }
    ?>
<?php
    $p_id = $_GET["p_id"];
    $delete_query = "delete from property where p_id = '$p_id'";

if ($con->query($delete_query) === TRUE) {
    header("location: profile.php?p_id=$p_id&message=Successfully Deleted the property!!&type=success");
  } else {
    // header('location: product.php?signup_success=You have Registered Successfully');
  }
  
  $con->close();
?>