<?php
require 'connection.php';
?>
<?php
session_start();
if (isset($_SESSION["o_id"])) {
    if (!isset($_GET["p_id"])) {
        header('location: profile.php');
    }
} else {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shoubhit Realtor | View & Update</title>
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

    <?php




    $p_id = $_GET["p_id"];
    $select_query = "SELECT * FROM PROPERTY WHERE P_ID = '$p_id'";
    $select_query_result = $con->query($select_query);
    $row = $select_query_result->fetch_assoc();

    function find_selected($attribute, $input, $row)
    {
        $value = $row[$attribute];
        if ($value == $input) {
            echo "selected";
        } else {
            echo "";
        }
    }

    function find_checked_amenities($input, $row)
    {
        $amenities = $row['amenities'];
        $amenities_array = explode(", ", $amenities);
        if (array_search($input, $amenities_array)) {
            echo "checked";
        } else {
            echo "error";
        }
    }
    // find_checked_amenities('24x7 Water', $row);
    
    ?>

    <!-- Brief Introduction -->
    <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
        <div class="container pt-3">
            <h3 class="display-4 text-center">
                Your Property "
                <?php echo $row["title"] ?>" registered with us.
            </h3>
            <p class="px-3 mx-3 text-center">
            </p>
        </div>
    </div>

    <!-- End of Brief Introduction -->

    <!-- Form -->

    <div class="container row align-items-start m-3 p-3">
        <h3 class="text-center">View/Edit Your Property</h3>
        <div class="col-10 offset-1">
            <form method="post" action="request_update_prop.php" enctype="multipart/form-data">
                <input type="hidden" name="p_id" value="<?php echo $row["p_id"] ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Property Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Property Title"
                        name="title" value="<?php echo $row["title"] ?>" />
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option>Type</option>
                            <option value="Commercial" <?php find_selected('type', 'Commercial', $row) ?>>Commercial
                            </option>
                            <option value="Residential" <?php find_selected('type', 'Residential', $row) ?>>Residential
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option>Category</option>
                            <option value="Plot" <?php find_selected('category', 'Plot', $row) ?>>Plot</option>
                            <option value="Land" <?php find_selected('category', 'Land', $row) ?>>Land</option>
                            <option value="Apartment" <?php find_selected('category', 'Apartment', $row) ?>>Apartment
                            </option>
                            <option value="Villa" <?php find_selected('category', 'Villa', $row) ?>>Villa</option>
                            <option value="Bungalow" <?php find_selected('category', 'Bungalow', $row) ?>>Bungalow
                            </option>
                            <option value="Resale House" <?php find_selected('category', 'Resale House', $row) ?>>Resale
                                House</option>
                            <option value="Old House" <?php find_selected('category', 'Old House', $row) ?>>Old House
                            </option>
                            <option value="Independent House" <?php find_selected('category', 'Independent House', $row)
                                ?>>Independent House</option>
                            <option value="2 BHK Flats" <?php find_selected('category', '2 BHK Flats', $row) ?>>2 BHK
                                Flats</option>
                            <option value="3 BHK Flats" <?php find_selected('category', '3 BHK Flats', $row) ?>>3 BHK
                                Flats</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Type</label>
                        <select class="form-select" aria-label="Default select example" name="tran_type">
                            <option>Transaction Type</option>
                            <option value="Rent" <?php find_selected('tran_type', 'Rent', $row) ?>>Rent</option>
                            <option value="Sale" <?php find_selected('tran_type', 'Sale', $row) ?>>Sale</option>
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Orientation</label>
                        <select class="form-select" aria-label="Default select example" name="orientation">
                            <option selected>Orientation</option>
                            <option value="East" <?php find_selected('orientation', 'East', $row) ?>>East</option>
                            <option value="West" <?php find_selected('orientation', 'West', $row) ?>>West</option>
                            <option value="North" <?php find_selected('orientation', 'North', $row) ?>>North</option>
                            <option value="South" <?php find_selected('orientation', 'South', $row) ?>>South</option>
                            <option value="North East" <?php find_selected('orientation', 'North East', $row) ?>>North
                                East</option>
                            <option value="North West" <?php find_selected('orientation', 'North West', $row) ?>>North
                                West</option>
                            <option value="South East" <?php find_selected('orientation', 'South East', $row) ?>>South
                                East</option>
                            <option value="South West" <?php find_selected('orientation', 'South West', $row) ?>>South
                                West</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Town</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kolkata"
                            name="town" value="Kolkata" disabled />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Locality</label>
                        <select class="form-select" aria-label="Default select example" name="locality">
                            <option selected>Locality</option>
                            <option value="Salt Lake" <?php find_selected('locality', 'Salt Lake', $row) ?>>Salt Lake
                            </option>
                            <option value="Anandpur" <?php find_selected('locality', 'Anandpur', $row) ?>>Anandpur
                            </option>
                            <option value="Sector 1" <?php find_selected('locality', 'Sector 1', $row) ?>>Sector 1
                            </option>
                            <option value="Sector 2" <?php find_selected('locality', 'Sector 2', $row) ?>>Sector 2
                            </option>
                            <option value="Sector 5" <?php find_selected('locality', 'Sector 5', $row) ?>>Sector 5
                            </option>
                            <option value="Tollygunge" <?php find_selected('locality', 'Tollygunge', $row) ?>>Tollygunge
                            </option>
                            <option value="Patuli" <?php find_selected('locality', 'Patuli', $row) ?>>Patuli</option>
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@Address"
                            name="address" value="<?php echo $row["address"] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Pincode</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="700107"
                            name="pincode" value="<?php echo $row["pincode"] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Property Price (in Rs.)" name="price" value="<?php echo $row["price"] ?>" />
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Area</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Property Area (in sq. ft.)" name="area" value="<?php echo $row["area"] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Available from</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="mm-dd-yyyy"
                            name="av_from" value="<?php echo $row["av_from"] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Floor Offering</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Floor?"
                            name="flr_off" value="<?php echo $row["flr_off"] ?>" />
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Total floor</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="No. of floors in building" name="t_flr" value="<?php echo $row["t_flr"] ?>" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Car Parking</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="No of cars that can be parked" name="n_c_park"
                            value="<?php echo $row["n_c_park"] ?>" />
                    </div>
                </div>

                <label for="exampleFormControlTextarea1" class="form-label">Amenities</label>
                <div class="row mt-1 mb-3">
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="24x7_Water" value="24x7 Water"
                                id="flexCheckDefault" <?php find_checked_amenities('24x7 Water', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                24x7 Water
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Air_Conditioner"
                                value="Air Conditioner" id="flexCheckDefault" <?php find_checked_amenities('Air
                                Conditioner', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Air Conditioner
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Bed" value="Bed" id="flexCheckDefault"
                                <?php find_checked_amenities('Bed', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Bed
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Car_Parking" value="Car Parking"
                                id="flexCheckDefault" <?php find_checked_amenities('Car Parking', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Car Parking
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Lift" value="Lift"
                                id="flexCheckDefault" <?php find_checked_amenities('Lift', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Lift
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Chair" value="Chair"
                                id="flexCheckDefault" <?php find_checked_amenities('Chair', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Chair
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Security" value="Security"
                                id="flexCheckDefault" <?php find_checked_amenities('Security', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Security
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="LAN_Connection" value="LAN Connection"
                                id="flexCheckDefault" <?php find_checked_amenities('LAN Connection', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                LAN Connection
                            </label>
                        </div>
                    </div>

                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Club_House" value="Club House"
                                id="flexCheckDefault" <?php find_checked_amenities('Club House', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Club House
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Conference_Room"
                                value="Conference Room" id="flexCheckDefault" <?php find_checked_amenities('Conference
                                Room', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Conference Room
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Flooring" value="Flooring"
                                id="flexCheckDefault" <?php find_checked_amenities('Flooring', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Flooring
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Modular_Kitchen"
                                value="Modular Kitchen" id="flexCheckDefault" <?php find_checked_amenities('Modular
                                Kitchen', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Modular Kitchen
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Swimming_Pool" value="Swimming Pool"
                                id="flexCheckDefault" <?php find_checked_amenities('Swimming Pool', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Nearby_Metro" value="Nearby Metro"
                                id="flexCheckDefault" <?php find_checked_amenities('Nearby Metro', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Nearby Metro
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Hospital" value="Hospital"
                                id="flexCheckDefault" <?php find_checked_amenities('Hospital', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Hospital
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Shopping_Mall" value="Shopping Mall"
                                id="flexCheckDefault" <?php find_checked_amenities('Shopping Mall', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Shopping Mall
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Vastu_Approved" value="Vastu Approved"
                                id="flexCheckDefault" <?php find_checked_amenities('Vastu Approved', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Vastu Approved
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Power_Backup" value="Power Backup"
                                id="flexCheckDefault" <?php find_checked_amenities('Power Backup', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Power Backup
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Geysers" value="Geysers"
                                id="flexCheckDefault" <?php find_checked_amenities('Geysers', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Geysers
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Walking_Tracks" value="Walking Tracks"
                                id="flexCheckDefault" <?php find_checked_amenities('Walking Tracks', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Walking Tracks
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Gym" value="Gym" id="flexCheckDefault"
                                <?php find_checked_amenities('Gym', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Gym
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Sports_Zone" value="Sports Zone"
                                id="flexCheckDefault" <?php find_checked_amenities('Sports Zone', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Sports Zone
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Park" value="Park"
                                id="flexCheckDefault" <?php find_checked_amenities('Park', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Park
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Open_Terrace" value="Open Terrace"
                                id="flexCheckDefault" <?php find_checked_amenities('Open Terrace', $row) ?> />
                            <label class="form-check-label" for="flexCheckDefault">
                                Open Terrace
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                        name="description"><?php echo $row["description"] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Images</label>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="deleteimage" value="deleteimage"
                            id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Delete Old Images
                        </label>
                    </div>
                    <input class="form-control m-1" type="file" id="formFile" name="image1" accept="image/jpg" />
                    <input class="form-control m-1" type="file" id="formFile" name="image2" accept="image/jpg" />
                    <input class="form-control m-1" type="file" id="formFile" name="image3" accept="image/jpg" />
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="tandc" value="tandc" id="flexCheckChecked"
                        checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        I agree to <span style="color: blue; text-decoration: underline;"
                            onclick="window.open('termsandconditions.html', 'termandconditions', 'width=600, height=400')">Terms
                            and Conditions</span>.
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="charges" value="charges" id="flexCheckChecked"
                        checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        I agree to pay Real Estate Commisions to Shoubhit Realtor.
                    </label>
                </div>
                <input type="submit" class="btn btn-primary mb-3 px-3 me-3" value="Update"></input>

                <a href="profile.php" style="text-decoration: none; float:right;" class="btn btn-secondary">Close</a>
            </form>
        </div>
    </div>

    <!-- End of Form -->

    <!-- Footer -->
    <div class="container-fluid m-0 p-0 navbar navbar-dark bg-purple">
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