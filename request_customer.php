<?php
    require 'connection.php';
?>

<?php
$p_id = $_POST['p_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$description = $_POST['description'];

$insert_query = "insert into customer (name, email, phone, description, p_id) values ('$name', '$email', '$phone', '$description', '$p_id')";
if ($con->query($insert_query) === TRUE) {
    header("location: propertydetail.php?p_id=$p_id&message=Our Agent will Contact you for this Property&type=success");
  } else {
    // header('location: product.php?signup_success=You have Registered Successfully');
  }
  
  $con->close();

?>