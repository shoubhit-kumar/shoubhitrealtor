<?php
require 'connection.php';
?>
<?php
session_start();
if (!isset($_SESSION["o_id"])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shoubhit Realtor | Owner Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="./css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <!-- Navbar -->

    <?php
    include "./owner_navbar.php";
    ?>

    <!-- End of navbar -->

    <!-- Alert -->
    <?php
    if (isset($_GET['message'])) {
        $type = $_GET['type'];
    ?>
    <div class="alert alert-<?php echo $type; ?> alert-dismissible fade show" role="alert">
        <strong>
            <?php
        echo $_GET['message'];
            ?>
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
    <!-- End of Alert -->


    <!-- Brief Introduction -->
    <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
        <div class="container pt-3">
            <h3 class="display-4 text-center">
                Properties Listed by You
            </h3>
            <p class="px-3 mx-3 text-center">
                Thank you for choosing our realtor service to post your valuable properties. Customer satisfaction is
                our first priority. We love to see you working with us. We always try to sell your property to its real
                worth and we are best in this. Keep posting and keep trust on us.
            </p>
        </div>
    </div>

    <!-- End of Brief Introduction -->

    <!-- Brief Desc Property -->

    <?php
    $o_id = $_SESSION["o_id"];
    $select_query = "SELECT * FROM PROPERTY WHERE O_ID = '$o_id'";
    $select_query_result = $con->query($select_query);

    if ($select_query_result->num_rows > 0) {
        while ($row = $select_query_result->fetch_assoc()) {
    ?>
    <div class="container bg-opprop align-items-start">
        <div class="container">
            <strong>
                <?php echo $row["title"]; ?>
            </strong>
            <br>
            <strong>Type: &nbsp;</strong>
            <?php echo $row["type"]; ?>
            <br>
            <strong>Description:</strong>
            <p class="ps-3">
                <?php echo $row["description"]; ?>
            </p>
            <strong>Address: &nbsp;</strong>
            <?php echo $row["address"] . ", ". $row["locality"]; ?>
            <br>
            <strong>Posted on: &nbsp;</strong>
            <?php echo $row["datetime"]; ?>
            <br>
            <br>
            <a href="viewupdateproperty.php?p_id=<?php echo $row["p_id"] ?>"
                style="color: black; text-decoration: none; padding-right: 5px;"><button
                    class="btn btn-primary">View/Edit</button></a>
            <a href="deleteproperty.php?p_id=<?php echo $row["p_id"] ?>"
                style="color: black; text-decoration: none;padding-left: 5px;"><button class="btn btn-danger">Delete
                    this property</button></a>
        </div>
    </div>
    <?php
        }
    } else {
    ?>
    <div class="container-fluid bintro p-0 m-0 pb-3">
        <div class="container pt-3">
            <h3 class="display-4 text-center">
                No Property is Posted by you Yet</h3>
        </div>
    </div>
    <?php
    }
    ?>



    <!-- End of Brief Desc Property -->

    <!-- Footer -->
    <div class="container-fluid position-relative m-0 p-0 navbar navbar-dark bg-purple" style="bottom: 0;">
        <h6 class="text-muted m-auto px-auto py-2">
            Copyright &#169; 2022 | Shoubhit Kumar - 2182029
        </h6>
    </div>
    <!-- End of Footer -->
    <script src="./js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>