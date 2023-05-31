<?php
require 'connection.php';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$num_per_page = 03;
$start_from = ($page - 1) * 03;

$query = "select * from property limit $start_from, $num_per_page";
$result = mysqli_query($con, $query);
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

  <!-- Carousel -->

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://thearchitectsdiary.com/wp-content/uploads/2019/12/vyanjankale-Assoc..jpg"
          class="d-block w-100" alt="..." height="550" />
      </div>
      <div class="carousel-item">
        <img src="https://thearchitectsdiary.com/wp-content/uploads/2020/07/feat-design-quest.jpg" class="d-block w-100"
          alt="..." height="550" />
      </div>
      <div class="carousel-item">
        <img src="https://thearchitectsdiary.com/wp-content/uploads/2020/11/feat-MJ-Interiors.jpg" class="d-block w-100"
          alt="..." height="550" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- End of carousel -->

  <!-- Brief Introduction -->
  <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
    <div class="container pt-3">
      <h3 class="display-4 text-center">
        Shoubhit Realtor - Real Estate Agent in Kolkata
      </h3>
      <p class="px-3 mx-3 text-center">
        Real estate is all about giving people a best deal of their life, and the world you imagined, we make it happen
        for you in a fair price. We always care about what your needs are and we are the best to fulfil it. We believe
        in honesty in dealings so please, if you can find any flaw of even a single penny just say no to us. Our
        partners are experienced and trustworthy and they always give their best to serve you.
      </p>
    </div>
  </div>

  <!-- End of Brief Introduction -->

  <!-- Brief Property Details -->
  <div class="container text-center py-3 mt-3">
    <span class="display-6">Properties listed with us</span>
    <p>
      Find your suitable property from the list of recently posted properties
      by our real estate agents and brokers in Kolkata. Click on the bellow
      property listings to view information in detail.
    </p>
  </div>

  <div class="container">
    <div class="row align-items-center">
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
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
        ?>

    </div>
  </div>
  <!-- End of Brief Property Details -->

  <!-- Pagination -->

  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3 pt-3">
      <?php
    $pr_query = "select * from property";
    $pr_result = mysqli_query($con, $pr_query);
    $total_record = mysqli_num_rows($pr_result);
    $total_page = ceil($total_record / $num_per_page);
    if ($page > 1) {
    ?>
      <li class="page-item">
        <a class="page-link" href="index.php?page=<?php echo ($page - 1); ?>">Previous</a>
      </li>
      <?php
    } else {
    ?>
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <?php
    }
    for ($i = 1; $i <= $total_page; $i++) {
    ?>
      <li class="page-item">
        <a class="page-link" href="index.php?page=<?php echo $i; ?>">
          <?php echo $i; ?>
        </a>
      </li>
      <?php
    }
    if ($i > $page and $page < $total_page) {
    ?>
      <li class="page-item">
        <a class="page-link" href="index.php?page=<?php echo ($page + 1); ?>">Next</a>
      </li>
      <?php
    } else {
    ?>
      <li class="page-item disabled">
        <a class="page-link">Next</a>
      </li>
      <?php
    }
    ?>
    </ul>
  </nav>

  <!-- End of Pagination -->




  <!-- What are u looking for -->
  <div class="whruloknf bg-bprop py-3 my-3">
    <div class="container text-center">
      <h3>What are you looking for?</h3>
      <p>
        We are Real Estate Agents in Kolkata. Please Let us know your
        requirement of properties in Kolkata along with budget. We will
        provide you a list of properties as per your requirement. You may also
        feel free to Post your property to Shoubhit Realtor's website if you
        are an Owners of a Property.
      </p>
      <div class="container text-center">
        <div class="row align-items-start">
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/1820776871bungalow.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Bungalow</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/451183807flats.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Flats</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/926388194hidco-plots.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Hidco Plots</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/1907839374independent-house.webp" class="rounded"
                alt="..." />
              <p class="whruloknfimgp">Independent house</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/1062397533office-space.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Office Space</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/139686089old-house.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Old House</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/1324944639plots.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Plots</p>
            </div>
          </div>
          <div class="col-3 m-0 p-0">
            <div class="text-center">
              <img src="https://www.ctrealtor.co.in/uploads/854531359shop.webp" class="rounded" alt="..." />
              <p class="whruloknfimgp">Shop</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of What are u looking for -->
  <!-- Our Clients -->
  <div class="container text-center my-3 pt-3">
    <h3>Our Clients</h3>
    <p>
      Here are few valuable feedback and comments from our clients given
      bellow. Requesting you give us your opinion also, if you have taken any
      services from our property dealers in Kolkata.
    </p>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide my-3 py-3" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="oct2">
          <div class="position-absolute top-0 translate-middle octimg2" style="left: 50%; z-index: 1;">
            <img src="./img/client/client1.jpg" alt="..." />
          </div>
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: black">Shikhar Dhillon</h5>
          <p style="color: black">
            "A great experience and fast purchase experience."
          </p>
        </div>
      </div>
      <div class="carousel-item active">
        <div class="oct2">
          <div class="position-absolute top-0 translate-middle octimg2" style="left: 50%; z-index: 1;">
            <img src="./img/client/client2.jpg" alt="..." />
          </div>
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: black">Satakshi</h5>
          <p style="color: black">
            "Loved the enthusiasm of the brooker and the hasslefree rent experience."
          </p>
        </div>
      </div>
      <div class="carousel-item active">
        <div class="oct2">
          <div class="position-absolute top-0 translate-middle octimg2" style="left: 50%; z-index: 1;">
            <img src="./img/client/client3.jpg" alt="..." />
          </div>
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5 style="color: black">Zakir Ahmad</h5>
          <p style="color: black">
            "One of the best real estate portal in the town."
          </p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- End of Our Clients -->
  <!-- Popular places -->
  <div class="container text-center my-3 pt-3">
    <h3>Most Popular Places</h3>
    <p>
      Here is list of locations within Kolkata where our property consultants
      are dealing in. You must contact us if you have any real estate need
      within these areas in Kolkata.
    </p>
  </div>
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-sm-4">
        <a href="propertytiles.php?locality=salt lake" style="text-decoration: none; color: azure">
          <div class="text-center mppimg my-2 py-2">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlQ0QJRYpkxJr8TTia8pqz9_v7gfZPmd5XzQ&usqp=CAU"
              class="rounded" alt="..." width="350px" height="250px" />
            <div class="mpptext">SALT LAKE CITY</div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="propertytiles.php?locality=anandpur" style="text-decoration: none; color: azure">
          <div class="text-center mppimg my-2 py-2">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlQ0QJRYpkxJr8TTia8pqz9_v7gfZPmd5XzQ&usqp=CAU"
              class="rounded" alt="..." width="350px" height="250px" />
            <div class="mpptext">ANANDPUR</div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="propertytiles.php?locality=sector 5" style="text-decoration: none; color: azure">
          <div class="text-center mppimg my-2 py-2">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlQ0QJRYpkxJr8TTia8pqz9_v7gfZPmd5XzQ&usqp=CAU"
              class="rounded" alt="..." width="350px" height="250px" />
            <div class="mpptext">SECTOR 5</div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- End of Popular places -->
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