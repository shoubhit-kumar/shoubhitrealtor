<?php
    require 'connection.php';
?>
<?php
    $home = "";
    $properties = "";
    $blogs = "";
    $about = "";
    $contact = "";
    if(isset($_GET['link'])){
        $link = $_GET['link'];
        if($link = 'home'){
            $home = "active";
        }
        else if($link = 'properties'){
            $properties = "active";
        }
        else if($link = 'blogs'){
            $blogs = "active";
        }
        else if($link = 'about'){
            $about = "active";
        }
        else if($contact = 'properties'){
            $contact = "active";
        }
    }
?>

  
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">S Realtor</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo "$home"; ?>" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo "$properties"; ?>" href="./properties.php">Properties</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link <?php echo "$blogs"; ?>" href="./blogs.php">Blogs</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link <?php echo "$about"; ?>" href="./aboutus.php">About Us</a>
        </li>
          <li class="nav-item">
            <a class="nav-link <?php echo "$contact"; ?>" href="./contactus.php">Contact Us</a>
          </li>
        </ul>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Login
        </button>
      </div>
    </div>
  </nav>

  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Owner Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Login Form -->
          <form action="request_login.php" method="post" id="login_form">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" />
            </div>
            <input type="submit" class="btn btn-primary"  value="Login" name="login" />
            <br />
            <a href="#" id="register_link">Register now</a>
          </form>

          <!-- Register form -->
          <form action="request_register.php" method="post" id="register_form" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password" />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mobile number</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="phone" />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Address</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="address" />
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">ID Proof</label>
              <input class="form-control" type="file" id="formFile" name="id_proof" accept="image/jpg" />
            </div>
            <input type="submit" class="btn btn-primary" value="Register" name="register" />
            <br />
            <a href="#" id="login_link">Login now</a>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- End of navbar -->