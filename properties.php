<?php
require 'connection.php';
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shoubhit Realtor | Properties</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <link href="./css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <!-- Navbar -->
  <?php
  include "./navbar.php";
  ?>

  <!-- End of navbar -->

  <!-- Brief Introduction -->
  <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
    <div class="container pt-3">
      <h3 class="display-4 text-center">Properties listed with us</h3>
      <p class="px-3 mx-3 text-center">
        Here are the properties listed with us and as you can see these are huge in number which define us how perfect
        we are in this business and the level of trust of our sellers and customers to us. Search for your dream
        property here. "Give us a chance, we will not let you down." A promise from a company who never breaks its
        promises.
      </p>
    </div>
  </div>

  <!-- End of Brief Introduction -->

  <!-- Filter Sort -->




  <div class="container-fluid p-0 m-0 pb-3">
    <div class="container pt-3">
      <h3 class="display-6 text-center">Find Your Dream Property from Shoubhit Realtor Kolkata</h3>
      <p class="px-3 mx-3 text-center">
        Select all of your search criteria one by one then click on search button. A list of properties as well as a
        list
        of related page links will come as a result. Click on the desire link to get more information of property.
      </p>
      <form action="" method="post">
        <div class="row">
          <div class="col-3">
            <strong>Type</strong>
            <br><br>
            <select class="form-select" aria-label="Default select example" name="type">
              <option selected>Type</option>
              <option value="Commercial">Commercial</option>
              <option value="Residential">Residential</option>
            </select>
          </div>
          <div class="col-3">
            <strong>Category</strong>
            <br><br>
            <select class="form-select" aria-label="Default select example" name="category">
              <option selected>Category</option>
              <option value="Plot">Plot</option>
              <option value="Land">Land</option>
              <option value="Apartment">Apartment</option>
              <option value="Villa">Villa</option>
              <option value="Bungalow">Bungalow</option>
              <option value="Resale House">Resale House</option>
              <option value="Old House">Old House</option>
              <option value="Independent House">Independent House</option>
              <option value="2 BHK Flats">2 BHK Flats</option>
              <option value="3 BHK Flats">3 BHK Flats</option>
            </select>
          </div>
          <div class="col-3">
            <strong>Transaction Type</strong>
            <br><br>
            <select class="form-select" aria-label="Default select example" name="tran_type">
              <option selected>Transaction Type</option>
              <option value="Rent">Rent</option>
              <option value="Sale">Sale</option>
            </select>
          </div>
          <div class="col-3">
            <strong>Locality</strong>
            <br><br>
            <select class="form-select" aria-label="Default select example" name="locality">
              <option selected>Locality</option>
              <option value="Salt Lake">Salt Lake</option>
              <option value="Anandpur">Anandpur</option>
              <option value="Sector 1">Sector 1</option>
              <option value="Sector 2">Sector 2</option>
              <option value="Sector 5">Sector 5</option>
              <option value="Tollygunge">Tollygunge</option>
              <option value="Patuli">Patuli</option>
            </select>
          </div>
        </div>
        <div class="row pt-3">
          <div class="col-2 offset-10 justify-content-end">
            <input type="submit" class="btn btn-primary btn-md" value="Search Property" name="Search_Property" />
          </div>
        </div>
      </form>
      <div class="d-grid gap-2 col-1 mx-auto">
        <h3>OR</h3>
      </div>
      <form action="" method="post">
        <h6>Term</h6>
        <div class="mb-3">
          <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
            placeholder="Property Search Term..">
        </div>
        <div class="row pt-3">
          <div class="col-2 offset-10 justify-content-end">
            <input type="submit" class="btn btn-primary btn-md" value="Search Property" name="Search_Property_Title" />
          </div>
        </div>

      </form>
    </div>
  </div>

  <div class="d-grid gap-2 col-8 mx-auto">
    <hr>
  </div>

  <!-- End of Filter Sort -->

  <!-- Properties card -->




  <div class="container">
    <div class="row">
      <?php
    if (isset($_POST['Search_Property'])) {
      $type = $_POST['type'];
      $category = $_POST['category'];
      $tran_type = $_POST['tran_type'];
      $locality = $_POST['locality'];
      if ($locality == "Locality") {
        $locality = "";
      }
      if ($type == "Type") {
        $type = "";
      }
      if ($category == "Category") {
        $category = "";
      }
      if ($tran_type == "Transaction Type") {
        $tran_type = "";
      }
      $select_query = "select * from property where type like '%$type%' and category like '%$category%' and tran_type like '%$tran_type%' and locality like '%$locality%'";
      $select_query_result = $con->query($select_query);

      if ($select_query_result->num_rows > 0) {
        while ($row = $select_query_result->fetch_assoc()) {
    ?>

      <div class="col col-md-4 px-0 mx-0 my-3">
        <a href="propertydetail.php?p_id=<?php echo $row['p_id']; ?>" style="color: black; text-decoration: none">
          <div class="card bg-bprop" style="width: 23rem">
            <img src="<?php echo $row['image1']; ?>" class="card-img-top" alt="No Inage Provided" height="230px" />
            <span class="position-absolute translate-middle badge bg-primary" style="left: 70%; top: 2%; z-index: 1">
              Rs.
              <?php echo $row['price']; ?>
            </span>
            <span class="position-absolute translate-middle badge bg-secondary" style="left: 90%; top: 2%; z-index: 1">
              For
              <?php echo $row['tran_type']; ?>
            </span>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $row['title']; ?>
              </h5>
              <div class="card-text">
                <div class="location d-flex flex-row">
                  <i class="fa fa-map-marker" style="font-size: 25px; color: rgb(7, 165, 244)"></i>
                  <p class="ps-2">
                    <?php echo $row['address'] . ", " . $row['locality'] . ", " . $row['town']; ?>
                  </p>
                </div>
                <div class="amenities d-flex flex-row mb-3 row pe-3">
                  <?php
          if ($row['amenities'] != ", ") {
            $amenities_array = explode(", ", $row['amenities']);
            for ($x = 1; $x < 4; $x += 1) {
                        ?>
                  <div class="p-2 d-flex flex-row col-4 m-0 p-0">
                    <i class="fa fa-hand-o-right" style="font-size: 18px"></i>
                    <p class="">
                      <?php echo $amenities_array[$x]; ?>
                    </p>
                  </div>
                  <?php
            }
          } else {
                            ?>
                  <div class="col-4"><strong>* &nbsp;</strong>No Amenities submitted. Request!</div>
                  <?php
          }
                          ?>
                </div>
                <div class="calendar d-flex flex-row mt-0">
                  <i class="fa fa-calendar" style="font-size: 18px"></i>
                  <p class="ps-2">
                    <?php echo $row['av_from']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php
        }
      } else {
    ?>
      <div class="container-fluid bintro p-0 m-0 pb-3">
        <div class="container pt-3">
          <h3 class="display-6 text-center">No Such Property Exist with us!</h3>
          <h3 class="display-6 text-center">Search for different one.</h3>
        </div>
      </div>
      <?php
      }
    }
    ?>






      <?php
if (isset($_POST['Search_Property_Title'])) {
  $title = "";
  $title = $_POST['title'];

  $select_query = "select * from property where title like '%$title%'";
  $select_query_result = $con->query($select_query);

  if ($select_query_result->num_rows > 0) {
    while ($row = $select_query_result->fetch_assoc()) {
?>

      <div class="col col-sm-4 px-0 mx-0 my-3">
        <a href="propertydetail.php?p_id=<?php echo $row['p_id']; ?>" style="color: black; text-decoration: none">
          <div class="card bg-bprop" style="width: 23rem">
            <img src="<?php echo $row['image1']; ?>" class="card-img-top" alt="No Inage Provided" height="230px" />
            <span class="position-absolute translate-middle badge bg-primary" style="left: 70%; top: 2%; z-index: 1">
              Rs.
              <?php echo $row['price']; ?>
            </span>
            <span class="position-absolute translate-middle badge bg-secondary" style="left: 90%; top: 2%; z-index: 1">
              For
              <?php echo $row['tran_type']; ?>
            </span>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $row['title']; ?>
              </h5>
              <div class="card-text">
                <div class="location d-flex flex-row">
                  <i class="fa fa-map-marker" style="font-size: 25px; color: rgb(7, 165, 244)"></i>
                  <p class="ps-2">
                    <?php echo $row['address'] . ", " . $row['locality'] . ", " . $row['town']; ?>
                  </p>
                </div>
                <div class="amenities d-flex flex-row mb-3 row pe-3">
                  <?php
      if ($row['amenities'] != ", ") {
        $amenities_array = explode(", ", $row['amenities']);
        for ($x = 1; $x < 2; $x += 1) {
                    ?>
                  <div class="p-2 d-flex flex-row col-4 m-0 p-0">
                    <i class="fa fa-hand-o-right" style="font-size: 18px"></i>
                    <p class="">
                      <?php echo $amenities_array[$x]; ?>
                    </p>
                  </div>
                  <?php
        }
      } else {
                      ?>
                  <div class="col-4"><strong>* &nbsp;</strong>No Amenities submitted. Request!</div>
                  <?php
      }
                      ?>
                </div>
                <div class="calendar d-flex flex-row mt-0">
                  <i class="fa fa-calendar" style="font-size: 18px"></i>
                  <p class="ps-2">
                    <?php echo $row['av_from']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php
    }
  } else {
?>
      <div class="container-fluid bintro p-0 m-0 pb-3">
        <div class="container pt-3">
          <h3 class="display-6 text-center">No Such Property Exist with us!</h3>
          <h3 class="display-6 text-center">Search for different one.</h3>
        </div>
      </div>
      <?php
  }
}

  ?>
    </div>
  </div>
  <!-- End of Properties card -->

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