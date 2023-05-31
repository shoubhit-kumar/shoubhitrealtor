<?php
    require 'connection.php';
?>

<?php
if(isset($_POST['register'])){
    $name = mysqli_escape_string($con, $_POST['name']);
$email = mysqli_escape_string($con, $_POST['email']);


$email_query = "SELECT * FROM OWNER WHERE EMAIL = '$email'";
$email_query_result = $con->query($email_query);

if ($email_query_result->num_rows > 0) {
    header('location: index.php?message=Register with another email id&type=danger');
}


else{
$password = mysqli_escape_string($con, $_POST['password']);
$phone = mysqli_escape_string($con, $_POST['phone']);
$address = mysqli_escape_string($con, $_POST['address']);
$id_proof = $_FILES['id_proof']['name'];
$tmp_id_proof = $_FILES['id_proof']['tmp_name'];
$folder = "img/id_proof/";
$file_name = $name. "_". $email. "_". $id_proof;
move_uploaded_file($tmp_id_proof, $folder.$file_name);
$register_query = "insert into owner (name, email, password, phone, address, id_proof) values ('$name', '$email', '$password', '$phone','$address', '$file_name');";

if ($con->query($register_query) === TRUE) {
    header('location: index.php?message=Registered Successfully!! - Login to Continue&type=success');
    //echo("Success");
  } else {
    // header('location: product.php?signup_success=You have Registered Successfully');
  }
}
}

  
  $con->close();

?>