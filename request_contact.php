<?php
    require 'connection.php';
?>

<?php
$name = mysqli_escape_string($con, $_POST['name']);
$email = mysqli_escape_string($con, $_POST['email']);
$phone = mysqli_escape_string($con, $_POST['phone']);
$description = mysqli_escape_string($con, $_POST['description']);

$contact_query = "insert into contact (name, email, phone, description) values ('$name', '$email', '$phone','$description');";

if ($con->query($contact_query) === TRUE) {
    header('location: contactus.php?message=We will contact you soon&type=success');
  } else {
    // header('location: product.php?signup_success=You have Registered Successfully');
  }
  
  $con->close();


?>