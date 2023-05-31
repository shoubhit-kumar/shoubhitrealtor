<?php
    require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shoubhit Realtor | Home</title>
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

    <!-- Brief Introduction -->
  <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
    <div class="container pt-3">
      <h3 class="display-4 text-center">Properties Tiles for <?php echo $_GET['locality']?></h3>
      <p class="px-3 mx-3 text-center">
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text ever
        since the 1500s, when an unknown printer took a galley of type and
        scrambled it to make a type specimen book. It has survived not only
        five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with
        the release of Letraset sheets containing Lorem Ipsum passages, and
        more recently with desktop publishing software like Aldus PageMaker
        including versions of Lorem Ipsum.
      </p>
    </div>
  </div>

  <!-- End of Brief Introduction -->


    <!-- Properties Card -->
    <div class="container">
    <div class="row">
    <?php
      $locality	= $_GET['locality'];
      $select_query	= "select * from property where locality = '$locality'";
      $select_query_result = $con->query($select_query);
    
	    if ($select_query_result->num_rows > 0) {
      while($row = $select_query_result->fetch_assoc())
        {
            ?>
            
            <div class="col col-md-4 px-0 mx-0 my-3">
              <a href="propertydetail.php?p_id=<?php echo $row['p_id']; ?>" style="color: black; text-decoration: none">
                <div class="card bg-bprop" style="width: 23rem">
                  <img
                    src="<?php echo $row['image1']; ?>"
                    class="card-img-top" alt="No Inage Provided" height="230px" />
                  <span class="position-absolute translate-middle badge bg-primary" style="left: 70%; top: 2%; z-index: 1">
                    Rs. <?php echo $row['price']; ?>
                  </span>
                  <span class="position-absolute translate-middle badge bg-secondary" style="left: 90%; top: 2%; z-index: 1">
                    For <?php echo $row['tran_type']; ?>
                  </span>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <div class="card-text">
                      <div class="location d-flex flex-row">
                        <i class="fa fa-map-marker" style="font-size: 25px; color: rgb(7, 165, 244)"></i>
                        <p class="ps-2"><?php echo $row['address'].", ".$row['locality'].", ".$row['town']; ?></p>
                      </div>
                      <div class="amenities d-flex flex-row mb-3 row pe-3">
                        <?php
                        if($row['amenities'] != ", "){
                          $amenities_array = explode(", ", $row['amenities']);
                          for ($x = 1; $x < 2; $x+=1){
                            ?>
                            <div class="p-2 d-flex flex-row col-4 m-0 p-0">
                          <i class="fa fa-hand-o-right" style="font-size: 18px"></i>
                          <p class=""><?php echo $amenities_array[$x];?></p>
                        </div>
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
                      <div class="calendar d-flex flex-row mt-0">
                        <i class="fa fa-calendar" style="font-size: 18px"></i>
                        <p class="ps-2"><?php echo $row['av_from']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
        </div>
    <?php
    }
  }else{
    ?>
    <div class="container-fluid bintro p-0 m-0 pb-3">
    <div class="container pt-3">
      <h3 class="display-6 text-center">No Such Property Exist with us!</h3>
      <h3 class="display-6 text-center">Search for different one.</h3>
    </div>
  </div>
    <?php
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