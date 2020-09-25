<?php

include("Return_Package.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Khaled Tours</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/Sign_in.css"> -->
    <link rel="stylesheet" href="css/imagehover.min.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/Global.css">
    <link rel="stylesheet" type="text/css" href="css/Package.css">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
-->
    <link href="css/animate.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/modernizr.custom.js"></script>

</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Berlin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">


                    <li> <a href="home.php">Home </a> </li>
                    <li class="active"><a href="Package.php">Package <span class="sr-only">(current)</span></a></li>
                    <li class=""><a href="Profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
                    <li><a href="Sign_up.php">Sign Up</a></li>

                    <li>
                        <a href="Sign_in.php" type="" data-toggle="" data-target="#">
                            <?php echo ( $_SESSION['First_Name'] == "") ? "Sign In": "Hello " . $_SESSION['First_Name']; ?></a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- Start POP UP -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <img src="img/sign/team.png" class="img-responsive images">
                    <h2 class="text-center">Log in</h2>
                </div>
                <div class="modal-body">
                    <form class="navbar-form navbar-right">
                        <div class="input-group">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fas fa-portrait"></i></span>
                            <input type="text" class="form-control" placeholder="Username"
                                aria-describedby="basic-addon1">
                        </div>

                        <br> <br>

                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-lock-open"></i></span>
                            <input type="text" class="form-control Fixed" placeholder="Password"
                                aria-describedby="basic-addon1">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <input type="button" value="Sign in" onclick="validateForm()" id="bot1" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End POP UP -->






    <!-- Start Content POP UP -->
    <div class="modal fade" id="Content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                    <h4 class="text-center">Hamburg </h4>
                    <img src="img/Package/Hamburg_Overview.jpg" alt="img02" class="img-responsive images">
                </div>
                <div class="modal-body">
                    <p>The picturesque city of Hamburg awaits you with its rich history and culture. Hamburg, Germany,
                        is located at the firth of River Elbe and is a heritage city offering several ancient
                        architectural wonders. The city boasts ancient churches and fine museums and is among Germany’s
                        wealthiest cities. The warehouse district of Speicherstadt, the ancient St. Michael’s Cathedral
                        and the amazing Miniatur Wunderland museum are among the places to visit in Hamburg. This 4-day
                        trip to Hamburg will have you explore the best of the city.</p>
                </div>
                <div class="modal-footer">
                    <a href="http://dribbble.com/shots/1115960-Music" class="test">Book Now</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Content POP UP -->


    <!-- Loader -->
    <div class="loader">
        <img src="img/Global/Plane Loader.gif">
    </div>



    <!-- First Section -->

    <section>
        <div class="image"></div>
        <div class="content">
            <p>
                Welcome To our Country
            </p>
            <p class="pos">Germany</p>
        </div>


    </section>

    <!-- End Section -->


    <!-- Start Section Packages -->

    <section class="Packages">
        <h2 class="text-center" style="margin-top: 50px;">Our Packages</h2>
        <hr>

        <div class="container">

            <div class="row">

            <?php foreach($Packages as $Package){  ?>
                <div class="col-lg-4"">
  
      <ul class=" grid cs-style-2">
                    <li>
                        <figure>
                            <?php echo '<img src="data:image/jpg;base64,'.base64_encode($Package['image'] ).'"/>';?>

                            <!-- <img src="img/Package/Hamburg_Overview.jpg" alt="img02"> -->
                            <figcaption>
                                <h4> <?php echo $Package['Title'];  ?> </h4>
                                <i class="fas fa-calendar-alt"></i> <span> <?php echo $Package['Days'];  ?></span>
                                <br>
                                <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i>
                                    <?php echo $Package['cost'];  ?>
                                </span>
                                <a href="home.php?id=<?php echo $Package['package_id'] ?> "
                                    id=<?php $Package['package_id'] ?>>Book Now</a>
                            </figcaption>
                        </figure>
                    </li>
                    </ul>

                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id=<?php echo "heading" . $Package['package_id'] ?>>
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                    href=<?php echo "#collapse" . $Package['package_id'] ?> aria-expanded="true"
                                    aria-controls=<?php echo "collapse" . $Package['package_id'] ?>>
                                    More Details
                                </a>
                            </h4>
                        </div>


                        <div id=<?php echo "collapse" . $Package['package_id'] ?> class="panel-collapse collapse"
                            role="tabpanel" aria-labelledby=<?php echo "heading" . $Package['package_id'] ?>>
                            <div class="panel-body">
                                <div class="pragPackage">
                                    <p><?php echo $Package['Description'];  ?></p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <?php }?>


                <!-- <div class="col-lg-4 col-md-6 col-sm-12"">
       
      <ul class="grid cs-style-2">
        <li>
          <figure>
            <img src="img/Package/Cycle_1471506402.jpg" alt="img02">
            <figcaption>
              <h4>Freiburg</h4>
              <i class="fas fa-calendar-alt"></i> <span> 4 Days - 3 Nights</span> <br>
          <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i> 59,990 </span>
          <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
            </figcaption>
          </figure>
        </li>
      </ul>
        
        
        <div class="panel panel-default ">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
           
                  <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                          More Details
                      </h4>
                  </div>
            </a>

            
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
               <div class="pragPackage">
                  <p>Black Forest is a forested mountain range located in the German state of Baden-Wurttemberg. The Black Forest gets its name from the dense and dark forest land in the region. Straggly waterfalls, deep valleys and lush greenery adorn this mountainous region. Not far off from Black Forest is the town of Baden-Baden that is located amid the Black Forest and Heidelberg, a college town in the state of Baden-Wurttemberg. Make the most of your 4-day Black Forest city break by exploring these beautiful towns. </p>
                    </div>
                </div>
            </div>
        </div>

   

      </div>


      <div class="col-lg-4 col-md-6 col-sm-12"">
  

   
      <ul class="grid cs-style-2">
        <li>
          <figure>
            <img src="img/Package/Frankfurt_Frankfurter_Romer.jpg" alt="img02">
            <figcaption>
              <h4>Frankfurt (5) Cologne (2) </h4>
              <i class="fas fa-calendar-alt"></i> <span> 8 Days - 7 Nights</span> <br>
          <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i>73,990 </span>
          <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
            </figcaption>
          </figure>
        </li>
      </ul>
     

        <div class="panel panel-default ">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
           
                  <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                          More Details
                      </h4>
                  </div>
            </a>


            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseThree">
                <div class="panel-body">
              <div class="pragPackage">
      <p>With medieval architectural buildings, beautiful castles, scenic beauty and a lot more to offer, this tour around the cities of Germany is the right definition of a rejuvenating break. During this 8-day tour, you will see Rudesheim town and the cities of Trier, Koblenz, Cologne and Bonn. Exploring the amazing castles of Germany, visiting the ancient churches and wine tasting are some of the interesting activities you will experience on your holiday here</p>
        </div>


                </div>
                     </div>
            </div>


      </div>





<div class="col-lg-4 col-md-6 col-sm-12"">
  
      <ul class="grid cs-style-2">
        <li>
          <figure>
            <img src="img/Package/Hamburg_Overview.jpg" alt="img02">
            <figcaption>
              <h4>Hamburg - City Break </h4>
              <i class="fas fa-calendar-alt"></i> <span> 4 days - 3 nights</span> <br>
          <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i> 28,990  </span>
          <a href="#">Book Now</a>
            </figcaption>
          </figure>
        </li>
      </ul>
      
        <div class="panel panel-default ">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
           
                  <div class="panel-heading" role="tab" id="headingFour">
                      <h4 class="panel-title">
                          More Details
                      </h4>
                  </div>
            </a>

            
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
               <div class="pragPackage">
      <p>The picturesque city of Hamburg awaits you with its rich history and culture. Hamburg, Germany, is located at the firth of River Elbe and is a heritage city offering several ancient architectural wonders. The city boasts ancient churches and fine museums and is among Germany’s wealthiest cities. The warehouse district of Speicherstadt, the ancient St. Michael’s Cathedral and the amazing Miniatur Wunderland museum are among the places to visit in Hamburg. This 4-day trip to Hamburg will have you explore the best of the city.</p>
        </div>

                </div>
            </div>
        </div>


      </div>

      <div class="col-lg-4 col-md-6 col-sm-12"">
       
      <ul class="grid cs-style-2">
        <li>
          <figure>
            <img src="img/Package/Cycle_1471506402.jpg" alt="img02">
            <figcaption>
              <h4>Freiburg</h4>
              <i class="fas fa-calendar-alt"></i> <span> 4 Days - 3 Nights</span> <br>
          <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i> 59,990 </span>
          <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
            </figcaption>
          </figure>
        </li>
      </ul>
        
        
        <div class="panel panel-default ">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
           
                  <div class="panel-heading" role="tab" id="headingFour">
                      <h4 class="panel-title">
                          More Details
                      </h4>
                  </div>
            </a>

            
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
               <div class="pragPackage">
                  <p>Black Forest is a forested mountain range located in the German state of Baden-Wurttemberg. The Black Forest gets its name from the dense and dark forest land in the region. Straggly waterfalls, deep valleys and lush greenery adorn this mountainous region. Not far off from Black Forest is the town of Baden-Baden that is located amid the Black Forest and Heidelberg, a college town in the state of Baden-Wurttemberg. Make the most of your 4-day Black Forest city break by exploring these beautiful towns. </p>
                    </div>
                </div>
            </div>
        </div>

   

      </div>


      <div class="col-lg-4 col-md-6 col-sm-12"">
  

   
      <ul class="grid cs-style-2">
        <li>
          <figure>
            <img src="img/Package/Frankfurt_Frankfurter_Romer.jpg" alt="img02">
            <figcaption>
              <h4>Frankfurt (5) Cologne (2) </h4>
              <i class="fas fa-calendar-alt"></i> <span> 8 Days - 7 Nights</span> <br>
          <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i>73,990 </span>
          <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
            </figcaption>
          </figure>
        </li>
      </ul>
     

        <div class="panel panel-default ">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
           
                  <div class="panel-heading" role="tab" id="headingFour">
                      <h4 class="panel-title">
                          More Details
                      </h4>
                  </div>
            </a>


            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseSix">
                <div class="panel-body">
              <div class="pragPackage">
                <p>With medieval architectural buildings, beautiful castles, scenic beauty and a lot more to offer, this tour around the cities of Germany is the right definition of a rejuvenating break. During this 8-day tour, you will see Rudesheim town and the cities of Trier, Koblenz, Cologne and Bonn. Exploring the amazing castles of Germany, visiting the ancient churches and wine tasting are some of the interesting activities you will experience on your holiday here</p>
              </div>


                </div>
            </div>
        </div>


      </div> -->



            </div>
        </div>
    </section>

    <!-- End Section Packages -->



    <div class="theworld"></div>



    <!-- <footer>

        <div class="container">
            <div class="row">


                <div class="col-lg-3">

                    <h1>Your Company</h1>

                </div>

                <div class="col-lg-9">
                    <ul class="FOOTER">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Package</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="Sign in.html" class="active">Sign In</a></li>
                    </ul>
                </div>


            </div>

        </div>
    </footer> -->






    <!-- end of page -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script scr="jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/global.js"></script>
    <script src="js/Sign_up.js"></script>
    <script src="js/jssor.slider-27.2.0.min.js" type="text/javascript"></script>
    <script src="js/toucheffects.js"></script>

</body>

</html>