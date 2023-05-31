<?php
    require 'connection.php';
?>
<?php
    session_start();
        if (!isset($_SESSION["o_id"])) {
            header('location: index.php');
        }
    ?>
<?php
    session_unset();
    session_destroy();
    header('location: index.php?message=Logged Out Successfully!!&type=success');
?>