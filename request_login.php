<?php
    require 'connection.php';
?>

<?php
if(isset($_POST['login'])){
    $password = mysqli_escape_string($con, $_POST['password']);
    $email = mysqli_escape_string($con, $_POST['email']);


$select_query = "SELECT * FROM OWNER WHERE EMAIL = '$email' AND PASSWORD = '$password'";
$select_query_result = $con->query($select_query);

if ($select_query_result->num_rows > 0) {
    while($row = $select_query_result->fetch_assoc())
        {
            session_start();
            $owner_id = $row["o_id"];
            $_SESSION["o_id"] = $owner_id;
            header("location: profile.php");
        }
}
else{
    header('location: index.php?message=Incorrect Login Credentials!!&type=danger');
}

}

  
  $con->close();

?>