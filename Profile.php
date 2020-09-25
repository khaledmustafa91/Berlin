<?php

session_start();
  //  $name = $_SESSION['user'];
  //  echo "Hello " . $name . "<br />";
  //  echo $_SESSION['id'] . "<br />";
  //  echo $_SESSION['First_Name']. "<br />";
  //  echo $_SESSION['Last_Name'] . "<br />";
  //  echo $_SESSION['Email'] . "<br />";
  //  echo $_SESSION['Phone'] . "<br />";
  //  echo $_SESSION['credit_card']. "<br />";
 include("config/database_connection.php");
 

 if(isset($_GET['id'])){

  $id = $_GET['id'];
  
  
  
  
  $sql = "SELECT * FROM package p JOIN profile_package pr_pg on p.package_id = pr_pg.package_id JOIN profile pr on pr.id = pr_pg.profile_id";
    
  $result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
  $Packages = mysqli_fetch_all($result,MYSQLI_ASSOC);
  mysqli_free_result($result);
 }

 if(isset($_GET['Package_id'])){
    $deleted_Package_id = mysqli_real_escape_string($conn,$_GET['Package_id']);
    $deleted_user_id = mysqli_real_escape_string($conn,$_GET['id']);
    $sql = "DELETE FROM profile_package WHERE profile_id = $deleted_user_id and package_id = $deleted_Package_id";
    //echo "Enterd Here";
    if(mysqli_query($conn,$sql)){
        //echo "HERE";
        $id = $_SESSION['id'];
        header("Location: Profile.php?id=$id");
    }else
    {
        echo "Error :" . mysqli_error($conn);
    }

}



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
    <link rel="stylesheet" type="text/css" href="css/Profile.css">
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
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
                    <li><a href="Package.php">Package <span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="#">Profile</a></li>
                    <li><a href="Log_out.php"> Log out</a></li>



                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <section class="pro">

        <div class="loader">
            <img src="img/Global/Plane Loader.gif">
        </div>
        <div class="container">

            <div class="row">

                <div class="col-lg-3 image">
                    <?php echo '<img src="data:image/jpg;base64,'.base64_encode($_SESSION['Profile_picture'] ).'" height="200" width="200" class=""/>';?>
                    <!--  <img src="img/sign/DSC_0257_0.jpg" class="img-responsive"> -->
                </div>

                <div class="Sign_up col-lg-9">

                    <h2 class="prag">Personal Information</h2> <br>

                    <hr>

                    <div class="pos">


                        <div>
                            <i class="fas fa-portrait"></i>
                            <h4 class="word"> <?php echo $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name']   ?>
                            </h4>
                        </div>



                        <br>

                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <h3 class="word"><?php echo $_SESSION['Email'];?></h3>
                        </div>

                        <br>

                        <div class="input-group">
                            <i class="fas fa-mobile"></i>
                            <h3 class="word"><?php echo $_SESSION['Phone'];?></h3>
                        </div>

                        <br>

                        <div class="input-group">
                            <i class="fas fa-credit-card"></i>
                            <h3 class="word"><?php echo $_SESSION['credit_card'];?></h3>
                        </div>


                    </div>


                </div>

            </div>


    </section>


    <section class="Package text-center">

        <h2>Your Packages</h2>

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
                                <a href="Profile.php?Package_id=<?php echo $Package['package_id'] ?>&id=<?php echo $_SESSION['id'] ?> " id= <?php $Package['package_id'] ?>>Delete Package</a>
                            </figcaption>
                        </figure>
                    </li>
                    </ul>

                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id= <?php echo "heading" . $Package['package_id'] ?> >
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href= <?php echo "#collapse" . $Package['package_id'] ?>
                                    aria-expanded="true" aria-controls=<?php echo "collapse" . $Package['package_id'] ?>>
                                    More Details
                                </a>
                            </h4>
                        </div>


                        <div id=<?php echo "collapse" . $Package['package_id'] ?> class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby=<?php echo "heading" . $Package['package_id'] ?> >
                            <div class="panel-body">
                                <div class="pragPackage">
                                    <p><?php echo $Package['Description'];  ?></p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
          <?php }?>
                <!-- <div class="col-lg-4"> -->

                    <!-- <ul class=" grid cs-style-2">
                    <li>
                        <figure>
                            <img src="img/Package/Cycle_1471506402.jpg" alt="img02">
                            <figcaption>
                                <h4>Freiburg</h4>
                                <i class="fas fa-calendar-alt"></i> <span> 4 Days - 3 Nights</span> <br>
                                <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i> 59,990
                                </span>
                                <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
                            </figcaption>
                        </figure>
                    </li>
                    </ul>


                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    More Details
                                </a>
                            </h4>
                        </div>


                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="pragPackage">
                                    <p>Black Forest is a forested mountain range located in the German state of
                                        Baden-Wurttemberg. The Black Forest gets its name from the dense and dark forest
                                        land in the region. Straggly waterfalls, deep valleys and lush greenery adorn
                                        this mountainous region. Not far off from Black Forest is the town of
                                        Baden-Baden that is located amid the Black Forest and Heidelberg, a college town
                                        in the state of Baden-Wurttemberg. Make the most of your 4-day Black Forest city
                                        break by exploring these beautiful towns. </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="col-lg-4"">
  

   
      <ul class=" grid cs-style-2">
                    <li>
                        <figure>
                            <img src="img/Package/Frankfurt_Frankfurter_Romer.jpg" alt="img02">
                            <figcaption>
                                <h4>Frankfurt (5) Cologne (2) </h4>
                                <i class="fas fa-calendar-alt"></i> <span> 8 Days - 7 Nights</span> <br>
                                <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i>73,990
                                </span>
                                <a href="http://dribbble.com/shots/1115960-Music">Book Now</a>
                            </figcaption>
                        </figure>
                    </li>
                    </ul>


                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">

                                    More Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="collapseThree">
                            <div class="panel-body">
                                <div class="pragPackage">
                                    <p>With medieval architectural buildings, beautiful castles, scenic beauty and a lot
                                        more to offer, this tour around the cities of Germany is the right definition of
                                        a rejuvenating break. During this 8-day tour, you will see Rudesheim town and
                                        the cities of Trier, Koblenz, Cologne and Bonn. Exploring the amazing castles of
                                        Germany, visiting the ancient churches and wine tasting are some of the
                                        interesting activities you will experience on your holiday here</p>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>


            </div>



        </div> -->


    </section>



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
    <script src="js/toucheffects.js"></script>

</body>

</html>