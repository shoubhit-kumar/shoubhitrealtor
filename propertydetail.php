<?php
    require 'connection.php';
?>
<?php
if(isset($_GET['p_id'])){
  $p_id = $_GET['p_id'];
  $select_query = "select * from property where p_id = '$p_id'";
  $select_query_result = $con->query($select_query);
  $row = $select_query_result->fetch_assoc();
  if (!$select_query_result->num_rows > 0) {
    header('location: index.php?message=No Such Property Exist!!&type=warning');
  }
}
else{
  header('location: index.php' );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shoubhit Realtor | Property Detail</title>
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

  <!-- Alert -->
  <?php
    if(isset($_GET['message'])){
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

  <!--  -->

  <div class="container-fluid text-center m-3 p-3">
    <div class="row">
      <div class="offset-md-1 col-md-7">
        <h4 class="text-start">Property Name - <?php echo $row['title'];?></h4>
        <!-- Carousel -->
        <div class="m-2">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner">
              <?php
              if($row['image1'] != ""){
                ?>
                <div class="carousel-item active">
                <img src="<?php echo $row['image1']; ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 1" height="550" />
              </div>
              <?php
              }
              if($row['image2'] != ""){
                ?>
                <div class="carousel-item">
                <img src="<?php echo $row['image2']; ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 2" height="550" />
              </div>
              <?php
              }
              if($row['image3'] != ""){
                ?>
                <div class="carousel-item">
                <img src="<?php echo $row['image3']; ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 3" height="550" />
              </div>
              <?php
              }
              if($row['image1'] == "" and $row['image2'] == "" and $row['image3'] == "" ){
                ?>
                <div class="carousel-item active">
                <img src=""
                  class="d-block w-100 text-center bg-secondary display-4" alt="No Image" height="550" />
              </div>
              <?php
              }
              
              ?>
              <!-- <div class="carousel-item active">
                <img src="<?php /* echo $row['image1'] */; ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 1" height="550" />
              </div>
              <div class="carousel-item">
                <img src="<?php /* echo $row['image2']; */ ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 2" height="550" />
              </div>
              <div class="carousel-item">
                <img src="<?php /* echo $row['image3']; */ ?>"
                  class="d-block w-100 text-center bg-secondary display-4" alt="Image 3" height="550" />
              </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <!-- End of carousel -->
        </div>
        <!--Listing Details-->

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>LISTING DETAILS</h4>
          <hr />
          <div class="row text-start ps-3 my-2">
            <div class="col-6"><strong>Property Id: &nbsp;</strong><?php echo $row['p_id']; ?></div>
            <div class="col-6">
              <strong>Available from: &nbsp;</strong><?php echo $row['av_from']; ?>
            </div>
            <div class="col-6">
              <strong>Property Type: &nbsp;</strong><?php echo $row['type']; ?>
            </div>
            <div class="col-6">
              <strong>Category: &nbsp;</strong><?php echo $row['category']; ?>
            </div>
            <div class="col-6">
              <strong>Orientation: &nbsp;</strong><?php echo $row['orientation']; ?>
            </div>
          </div>
        </div>

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>BASIC INFORMATION</h4>
          <hr />
          <div class="row text-start ps-3 my-2">
            <div class="col-6"><strong>Area: &nbsp;</strong><?php echo $row['area']; ?>sq. ft</div>
            <div class="col-6"><strong>Floor offering: &nbsp;</strong><?php echo $row['flr_off']; ?></div>
            <div class="col-6"><strong>total Floors: &nbsp;</strong><?php echo $row['t_flr']; ?></div>
            <!-- <div class="col-6">
              <strong>Condition: &nbsp;</strong>Condition
            </div> -->
            <div class="col-6"><strong>Car parking: &nbsp;</strong><?php echo $row['n_c_park']; ?></div>
          </div>
        </div>

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>PRICING DETAILS</h4>
          <hr />
          <div class="row text-start ps-3 my-2">
            <div class="col-6">
              <strong>Transaction Type: &nbsp;</strong><?php echo $row['tran_type']; ?>
              <br>
              <strong>Price: &nbsp;</strong>Rs. <?php echo $row['price']; ?>
            </div>
          </div>
        </div>

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>AMENITIES</h4>
          <hr />
          <div class="row text-start ps-3 my-2">
              <?php
              if($row['amenities'] != ", "){
                $amenities_array = explode(", ", $row['amenities']);
                for ($x = 1; $x < count($amenities_array); $x+=1){
                  ?>
                  <div class="col-4"><strong>* &nbsp;</strong><?php echo $amenities_array[$x];?></div>
                  <?php
                }
              }
              else{
                ?>
                <div class="col-4"><strong>* &nbsp;</strong>No Amenities submitted. Request!</div>
                <?php
              }
              ?>
          </div>
        </div>

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>DESCRIPTION</h4>
          <hr />
          <div class="text-start px-3 my-2">
            <p>
            <?php echo $row['description']; ?>
            </p>
          </div>
        </div>

        <div class="container-fluid bg-bprop my-3 p-2">
          <h4>ADDRESS</h4>
          <hr />
          <div class="text-start px-3 my-2">
            <div class="d-flex flex-row">
              <i class="fa fa-map-marker"></i>
              <p class="ps-2"><?php echo $row['address'].", ".$row['locality']; ?></p>
            </div>
            <strong>City: &nbsp;</strong>Kolkata
            <br>
            <strong>Location: &nbsp;</strong>.for map(may be)..
          </div>
        </div>

        <!--End of Listing Details-->
      </div>
      <div class="col-md-3">
        <div class="container">
          <br><br>
          <hr style="height:2px;border-width:0;color:rgb(27, 8, 240);background-color:rgb(27, 8, 240)">
        </div>
        <h4>Request an Enquiry</h4>
        <br>
        <div class="container-fluid">
          <form method="post" action="request_customer.php">
            <input type="hidden" name="p_id" value="<?php echo "$p_id";?>">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Name" name="name"
                aria-describedby="emailHelp" required/>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email"
                aria-describedby="emailHelp" required/>
            </div>
            <div class="mb-3">
              <input type="number" class="form-control" placeholder="Phone number" name="phone"
                aria-describedby="emailHelp" required/>
            </div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="description"
                style="height: 100px" required></textarea>
              <label for="floatingTextarea2">Description</label>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="Send" />
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--  -->

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