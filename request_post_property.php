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
$p_id = $_POST["p_id"];
$o_id = $_SESSION["o_id"];
$title = $_POST["title"];
$type = $_POST["type"];
$category = $_POST["category"];
$tran_type = $_POST["tran_type"];
$orientation = $_POST["orientation"];
// $town = $_POST["town"];
$locality = $_POST["locality"];
$address = $_POST["address"];
$pincode = $_POST["pincode"];
$price = $_POST["price"];
$area = $_POST["area"];
$av_from = $_POST["av_from"];
$flr_off = $_POST["flr_off"];
$t_flr = $_POST["t_flr"];
$n_c_park = $_POST["n_c_park"];

$array_amenities = array();
if (isset($_POST['24x7_Water']) && $_POST["24x7_Water"] == "24x7 Water") {
    array_push($array_amenities, "24x7 Water");
}
if (isset($_POST['Air_Conditioner']) && $_POST["Air_Conditioner"] == "Air Conditioner") {
    array_push($array_amenities, "Air Conditioner");
}
if (isset($_POST['Bed']) && $_POST["Bed"] == "Bed") {
    array_push($array_amenities, "Bed");
}
if (isset($_POST['Car_Parking']) && $_POST["Car_Parking"] == "Car Parking") {
    array_push($array_amenities, "Car Parking");
}
if (isset($_POST['Lift']) && $_POST["Lift"] = "Lift") {
    array_push($array_amenities, "Lift");
}
if (isset($_POST['Chair']) && $_POST["Chair"] == "Chair") {
    array_push($array_amenities, "Chair");
}
if (isset($_POST['Security']) && $_POST["Security"] == "Security") {
    array_push($array_amenities, "Security");
}
if (isset($_POST['LAN_Connection']) && $_POST["LAN_Connection"] == "LAN Connection") {
    array_push($array_amenities, "LAN Connection");
}
if (isset($_POST['Club_House']) && $_POST["Club_House"] == "Club House") {
    array_push($array_amenities, "Club House");
}
if (isset($_POST['Conference_Room']) && $_POST["Conference_Room"] == "Conference Room") {
    array_push($array_amenities, "Conference Room");
}
if (isset($_POST['Flooring']) && $_POST["Flooring"] == "Flooring") {
    array_push($array_amenities, "Flooring");
}
if (isset($_POST['Modular_Kitchen']) && $_POST["Modular_Kitchen"] == "Modular Kitchen") {
    array_push($array_amenities, "Modular Kitchen");
}
if (isset($_POST['Swimming_Pool']) && $_POST["Swimming_Pool"] == "Swimming Pool") {
    array_push($array_amenities, "Swimming Pool");
}
if (isset($_POST['Nearby_Metro']) && $_POST["Nearby_Metro"] == "Nearby Metro") {
    array_push($array_amenities, "Nearby Metro");
}
if (isset($_POST['Hospital']) && $_POST["Hospital"] == "Hospital") {
    array_push($array_amenities, "Hospital");
}
if (isset($_POST['Shopping_Mall']) && $_POST["Shopping_Mall"] == "Shopping Mall") {
    array_push($array_amenities, "Shopping Mall");
}
if (isset($_POST['Vastu_Approved']) && $_POST["Vastu_Approved"] == "Vastu Approved") {
    array_push($array_amenities, "Vastu Approved");
}
if (isset($_POST['Power_Backup']) && $_POST["Power_Backup"] == "Power Backup") {
    array_push($array_amenities, "Power Backup");
}
if (isset($_POST['Geysers']) && $_POST["Geysers"] == "Geysers") {
    array_push($array_amenities, "Geysers");
}
if (isset($_POST['Walking_Tracks']) && $_POST["Walking_Tracks"] == "Walking Tracks") {
    array_push($array_amenities, "Walking Tracks");
}
if (isset($_POST['Gym']) && $_POST["Gym"] == "Gym") {
    array_push($array_amenities, "Gym");
}
if (isset($_POST['Sports_Zone']) && $_POST["Sports_Zone"] == "Sports Zone") {
    array_push($array_amenities, "Sports Zone");
}
if (isset($_POST['Park']) && $_POST["Park"] == "Park") {
    array_push($array_amenities, "Park");
}
if (isset($_POST['Open_Terrace']) && $_POST["Open_Terrace"] == "Open Terrace") {
    array_push($array_amenities, "Open Terrace");
}

$amenities = implode(", ", $array_amenities);
$amenities = ", " . $amenities;

$description = $_POST["description"];

if (!isset($_POST['tandc'])) {
    header("location: viewupdateproperty.php?p_id=$p_id&message=Check Terms and Condition&type=danger");
}
if (!isset($_POST['charges'])) {
    header("location: viewupdateproperty.php?p_id=$p_id&message=Check Charges Condition&type=danger");
}

$insert_query = "insert into property (title, type, category, tran_type, orientation, locality, address, pincode, price, area, av_from, flr_off, t_flr, n_c_park, amenities, description, o_id) values ('$title', '$type', '$category', '$tran_type', '$orientation', '$locality', '$address', '$pincode', '$price', '$area', '$av_from', '$flr_off', '$t_flr', '$n_c_park', '$amenities', '$description', '$o_id')";
if ($con->query($insert_query) === TRUE) {
    // header("location: propertydetail.php?p_id=$pid&message=Our Agent will Contact you for this Property&type=success");
    echo "Inserted";
} else {
    // header('location: product.php?signup_success=You have Registered Successfully');
}

$select_query = "select max(p_id) as maxi from property";
$select_query_result = $con->query($select_query);
$row = $select_query_result->fetch_assoc();
$p_id = $row['maxi'];

$image1 = $_FILES['image1']['name'];
$image2 = $_FILES['image2']['name'];
$image3 = $_FILES['image3']['name'];
$tmp_image1 = $_FILES['image1']['tmp_name'];
$tmp_image2 = $_FILES['image2']['tmp_name'];
$tmp_image3 = $_FILES['image3']['tmp_name'];
$filename1 = "";
$filename2 = "";
$filename3 = "";
if (!($image1 == "")) {
    $folder = "img/property/" . $p_id . "_" . $title;
    if (!is_dir($folder)) {
        mkdir($folder);
    }
    $folder = $folder . "/";
    move_uploaded_file($tmp_image1, $folder . "image1.jpg");
    $filename1 = $folder . "image1.jpg";
}
if (!($image2 == "")) {
    $folder = "img/property/" . $p_id . "_" . $title;
    if (!is_dir($folder)) {
        mkdir($folder);
    }
    $folder = $folder . "/";
    move_uploaded_file($tmp_image2, $folder . "image2.jpg");
    $filename2 = $folder . "image2.jpg";
}
if (!($image3 == "")) {
    $folder = "img/property/" . $p_id . "_" . $title;
    if (!is_dir($folder)) {
        mkdir($folder);
    }
    $folder = $folder . "/";
    move_uploaded_file($tmp_image3, $folder . "image3.jpg");
    $filename3 = $folder . "image3.jpg";
}

$update_query = "update property set image1 = '$filename1', image2 = '$filename2', image3 = '$filename3' where p_id = '$p_id'";
if ($con->query($update_query) === TRUE) {
    header("location: profile.php?message=Successfully Posted a Property!!&type=success");
} else {
    // header('location: product.php?signup_success=You have Registered Successfully');
}


$con->close();
?>