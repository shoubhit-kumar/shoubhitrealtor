<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shoubhit Realtor | Post Property</title>
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

    <!-- Brief Introduction -->
    <div class="container-fluid bintro p-0 m-0 bg-bintro pb-3">
        <div class="container pt-3">
            <h3 class="display-4 text-center">
                Post your Property with Shoubhit Realtor
            </h3>
            <p class="px-3 mx-3 text-center">

            </p>
        </div>
    </div>

    <!-- End of Brief Introduction -->

    <!-- Form -->

    <div class="container row align-items-start m-3 p-3">
        <h3 class="text-center">Enter Your Property Details!</h3>
        <div class="col-10 offset-1">
            <form method="post" action="request_post_property.php" enctype="multipart/form-data">
                <!-- <input type="hidden" name="p_id" value="<?php //echo $row["p_id"] ?>"> -->
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Property Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="Property Title" name="title" />
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected>Type</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Residential">Residential</option>
                          </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Category</label>
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
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Transaction Type</label>
                        <select class="form-select" aria-label="Default select example" name="tran_type">
                            <option selected>Transaction Type</option>
                            <option value="Rent">Rent</option>
                            <option value="Sale">Sale</option>
                          </select>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Orientation</label>
                        <select class="form-select" aria-label="Default select example" name="orientation">
                            <option selected>Orientation</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="North East">North East</option>
                            <option value="North West">North West</option>
                            <option value="South East">South East</option>
                            <option value="South West">South West</option>
                          </select>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Town</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kolkata" name="town" value="Kolkata" disabled/>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Locality</label>
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
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="@Address" name="address" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Pincode</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="700107" name="pincode" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Property Price (in Rs.)" name="price" />
                    </div>
                    
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Area</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Property Area (in sq. ft.)" name="area" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Available from</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1"
                            placeholder="mm-dd-yyyy" name="av_from" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Floor Offering</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Floor?" name="flr_off" />
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Total floor</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="No. of floors in building" name="t_flr" />
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Car Parking</label>
                        <input type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="No of cars that can be parked" name="n_c_park" />
                    </div>
                </div>

                <label for="exampleFormControlTextarea1" class="form-label">Amenities</label>
                <div class="row mt-1 mb-3">
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="24x7_Water" value="24x7 Water" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                24x7 Water
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Air_Conditioner" value="Air Conditioner" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Air Conditioner
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Bed" value="Bed" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Bed
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Car_Parking" value="Car Parking" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Car Parking
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Lift" value="Lift" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Lift
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Chair" value="Chair" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Chair
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Security" value="Security" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Security
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="LAN_Connection" value="LAN Connection" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                LAN Connection
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Club_House" value="Club House" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Club House
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Conference_Room" value="Conference Room" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Conference Room
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Flooring" value="Flooring" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Flooring
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Modular_Kitchen" value="Modular Kitchen" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Modular Kitchen
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Swimming_Pool" value="Swimming Pool" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Swimming Pool
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Nearby_Metro" value="Nearby Metro" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Nearby Metro
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Hospital" value="Hospital" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Hospital
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Shopping_Mall" value="Shopping Mall" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Shopping Mall
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Vastu_Approved" value="Vastu Approved" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Vastu Approved
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Power_Backup" value="Power Backup" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Power Backup
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Geysers" value="Geysers" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                               Geysers
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Walking_Tracks" value="Walking Tracks" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Walking Tracks
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Gym" value="Gym" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Gym
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Sports_Zone" value="Sports Zone" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Sports Zone
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Park" value="Park" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Park
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Open_Terrace" value="Open Terrace" id="flexCheckDefault" />
                            <label class="form-check-label" for="flexCheckDefault">
                                Open Terrace
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Images</label>
                    <input class="form-control m-1" type="file" id="formFile" name="image1" accept="image/jpg" />
                    <input class="form-control m-1" type="file" id="formFile" name="image2" accept="image/jpg" />
                    <input class="form-control m-1" type="file" id="formFile" name="image3" accept="image/jpg" />
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="tandc" value="tandc" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree to 
                    </label>
                    <span style="color: blue; text-decoration: underline; cursor: pointer;" onclick="window.open('termsandconditions.html', 'termandconditions', 'width=600, height=400')">Terms and Conditions</span>.
                  </div>
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="charges" value="charges" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree to pay Real Estate Commisions to Shoubhit Realtor.
                    </label>
                  </div>
                  <input type="submit" class="btn btn-primary mb-3 px-3 me-3" value="Post Property" ></input>
                  <input type="reset" class="btn btn-primary mb-3 px-3 me-3" value="Reset" ></input>
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