<?php 
   include("config/database_connection.php");

  // retore all package in data base
  //include("Return_Package.php");
  //echo session_status();
  session_start();
  //echo $_SESSION['id'];
  if(empty($_SESSION['First_Name'])){
    $_SESSION['First_Name'] ="";
    //echo "Empty";
  }

    $sql = "SELECT * from package";
  
    $result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
    $Packages = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

  // user add package to his profile 
  if(isset($_GET['id'])){
    if(session_status() == PHP_SESSION_ACTIVE ){
      
      $profile_id = mysqli_real_escape_string($conn,$_SESSION['id']);
      $package_id = mysqli_real_escape_string($conn,$_GET['id']);

      $sql = "INSERT INTO profile_package(profile_id,package_id) VALUES('$profile_id','$package_id')";
      if(mysqli_query($conn,$sql)){
        $message ="Booked successfully send";
            echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else{
        echo "query error : " . mysqli_error($conn);
      }
    }else
    {
        $message ="Log in first";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }


  // Contact us form handel 
  $error = ['name'=>'' , 'email'=>'', 'phone'=>'','message'=>''];
  if(isset($_POST['sendMessage'])){
    if(empty($_POST['name'])){
        $error['name'] = "Enter your name";
    }
    if(empty($_POST['email'])){
    $error['email'] = "Enter your Email";
    }
    if(empty($_POST['phone'])){
        $error['phone'] = "Enter your phone";
    }  
    if(empty($_POST['message'])){
        $error['message'] = "Enter your message";
    }
    if( !array_filter($error))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact_us(Name, email, Phone, message) VALUES ('$name', '$email', '$phone', '$message')";
        if(mysqli_query($conn,$sql)){
            $message ="Message succsflly send";
            echo "<script type='text/javascript'>alert('$message');</script>";
            //echo 
        }
        else{
        echo "query error : " . mysqli_error($conn);
        }  
    }
}


//   $error="";
//   $id="";
//   if(isset($_POST['submit'])){
//     //session_start();

//     //$_SESSION['user'] = $_POST['user'];
    

//     //header("Location: Profile.php");

//     //echo $_POST['user'];
//     $name = $_POST['user'];
//     $pass = $_POST['pass'];
//     echo $name . "<br/>";
//     echo $pass . "<br/>";
//     $sql = "SELECT * from profile where First_Name='$name' and pass='$pass';";
    
//     $result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
//     $userResult = mysqli_fetch_assoc($result);
//     if($userResult){

//       session_start();
//       echo "user exist";
//   //     $id = $userResult['id'];
      
//       $_SESSION['user'] = $userResult['Last_Name'];
      
//   // //$_SESSION['user'] = $userResult['First_Name']; ;
//       $id =  $userResult['id'];
//       $_SESSION['id'] = $userResult['id'];
//       $_SESSION['First_Name'] = $userResult['First_Name'];
//       $_SESSION['Last_Name'] = $userResult['Last_Name'];
//       $_SESSION['Email'] = $userResult['Email'];
//       $_SESSION['Phone'] = $userResult['Phone'];
//       $_SESSION['credit_card'] = $userResult['credit_card'];
//       $_SESSION['Profile_picture'] = $userResult['Profile_picture'];



//       header("Location: Profile.php?id=$id");
//       mysqli_free_result($result);


//       //echo '<img src="data:image/jpg;base64,'.base64_encode($userResult['Profile_picture'] ).'" height="200" width="200"/>';
 
//     }
//     else{
//   //    echo "user is not exist !";
//       $error ="user is not exist !";
//     }
    
    
//     // Close connection
//     mysqli_close($conn);

//   }


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
    <link rel="stylesheet" type="text/css" href="css/Home.css">
    <link href="https://fonts.googleapis.com/css?family=Gaegu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Knewave" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Coda+Caption:800" rel="stylesheet">

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


                    <li class="active"> <a href="#">Home </a> </li>
                    <li><a href="Package.php">Package <span class="sr-only">(current)</span></a></li>
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
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <img src="img/sign/team.png" class="img-responsive images">
                    <h2 class="text-center">Log in</h2>
                </div>

                <div class="modal-body">
                    <form class="navbar-form navbar-right" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon " id="sizing-addon1"><i class="fas fa-portrait"></i></span>
                            <input type="text" class="form-control" placeholder="Username"
                                aria-describedby="basic-addon1" name="user">
                        </div>

                        <br> <br>

                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-lock-open"></i></span>
                            <input type="text" class="form-control Fixed" placeholder="Password"
                                aria-describedby="basic-addon1" name="pass">

                        </div>
                        <input type="submit" value="Sign in" onclick="validateForm()" id="bot1" class="btn btn-primary"
                            name="submit">

                    </form>
                </div>

                <form method="POST">
                    <div class="modal-footer" style="color:red;">
                        <?php //echo $error ?>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div> -->
    <!-- End POP UP -->



    <section class="banner">

        <div class="loader">
            <img src="img/Global/Plane Loader.gif">
        </div>
        <br>

        <!-- Start Slider Old -->

        <div class="carousel slide" id="carousel-example-captions" data-ride="carousel">
            <ol class="carousel-indicators">

                <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="3" class=""></li>
                <li data-target="#carousel-example-captions" data-slide-to="4" class=""></li>


            </ol>


            <div class="carousel-inner" role="listbox">
                <div class="item active">

                    <img src="img/Home/architecture-art-berlin-532864.jpg" class="img-responsive"
                        data-holder-rendered="true">

                    <div class="carousel-caption">
                        <h3>Germany</h3>
                    </div>

                </div>





                <div class="item">

                    <img src="img/Home/germany_sinsheim_river_sky_108033_1920x1080.jpg" data-holder-rendered="true">

                    <div class="carousel-caption">
                        <p>Sinsheim river sky</p>
                    </div>
                </div>




                <div class="item">
                    <img src="img/Home/germany_cologne_building_architecture_28613_1920x1080.jpg"
                        data-holder-rendered="true">

                </div>


                <div class="item">

                    <img src="img/Home/germany_building_castle_old_sky_hdr_38242_1920x1080.jpg"
                        data-holder-rendered="true">

                </div>


                <div class="item">


                    <img src="img/Home/architecture-building-central-station-970763.jpg" data-holder-rendered="true">

                    <div class="carousel-caption">
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>

                </div>





            </div> <a href="#carousel-example-captions" class="left carousel-control" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a>
            <a href="#carousel-example-captions" class="right carousel-control" role="button" data-slide="next"> <span
                    class="glyphicon glyphicon-chevron-right" aria-hidden="true">

                </span> <span class="sr-only">Next</span> </a>
        </div>

        <!-- End Slider Old -->

    </section>


    <!-- Second Section -->

    <h1 class="text-center heading">Germany</h1>
    <hr>

    <section class="Video container">

        <div class="">

            <div class="row" style="height: 500px;">

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <h1>Germany</h1>
                    <p>The concept of Germany as a distinct region in central Europe can be traced to Roman commander
                        Julius Caesar, who referred to the unconquered area east of the Rhine as Germania, thus
                        distinguishing it from Gaul (France), which he had conquered. The victory of the Germanic tribes
                        in the Battle of the Teutoburg Forest (AD 9) prevented annexation by the Roman Empire, although
                        the Roman provinces of Germania Superior and Germania Inferior were established along the Rhine.
                        Following the Fall of the Western Roman Empire, the Franks conquered the other West Germanic
                        tribes. When the Frankish Empire was divided among Charles the Great's heirs in 843, the eastern
                        part became East Francia. In 962, Otto I became the first Holy Roman Emperor of the Holy Roman
                        Empire, the medieval German state</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 videos">
                    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/IPbzWJNmndY?start=39" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                </div>

            </div>

        </div>

    </section>



    <h2 class="text-center heading">Our Packges</h2>
    <hr>

    <!-- Package Section -->

    <section class="Package">

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
                <!-- 
                <div class="col-lg-4 col-md-6 col-sm-12"">
       
      <ul class=" grid cs-style-2">
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


                <div class="col-lg-4 col-md-6 col-sm-12"">
  

   
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







                <div class="col-lg-4 col-md-6 col-sm-12"">
  
      <ul class=" grid cs-style-2">
                    <li>
                        <figure>
                            <img src="img/Package/Hamburg_Overview.jpg" alt="img02">
                            <figcaption>
                                <h4>Hamburg - City Break </h4>
                                <i class="fas fa-calendar-alt"></i> <span> 4 days - 3 nights</span> <br>
                                <i class="fas fa-money-check-alt"></i> <span> <i class="fas fa-euro-sign"></i> 28,990
                                </span>
                                <a href="#">Book Now</a>
                            </figcaption>
                        </figure>
                    </li>
                    </ul>

                    <div class="panel panel-default ">
                        <div class="panel-heading" role="tab" id="headingfour">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour"
                                    aria-expanded="true" aria-controls="collapsefour">
                                    More Details
                                </a>
                            </h4>
                        </div>


                        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingfour">
                            <div class="panel-body">
                                <div class="pragPackage">
                                    <p>The picturesque city of Hamburg awaits you with its rich history and culture.
                                        Hamburg, Germany, is located at the firth of River Elbe and is a heritage city
                                        offering several ancient architectural wonders. The city boasts ancient churches
                                        and fine museums and is among Germany’s wealthiest cities. The warehouse
                                        district of Speicherstadt, the ancient St. Michael’s Cathedral and the amazing
                                        Miniatur Wunderland museum are among the places to visit in Hamburg. This 4-day
                                        trip to Hamburg will have you explore the best of the city.</p>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 col-md-6 col-sm-12"">
       
      <ul class=" grid cs-style-2">
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
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive"
                                    aria-expanded="false" aria-controls="collapsefive">
                                    More Details
                                </a>
                            </h4>
                        </div>


                        <div id="collapsefive" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingfive">
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


                <div class="col-lg-4 col-md-6 col-sm-12"">
  

   
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
                        <div class="panel-heading" role="tab" id="headingsix">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapsesix" aria-expanded="true" aria-controls="collapsesix">

                                    More Details
                                </a>
                            </h4>
                        </div>
                        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="collapsesix">
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
                </div> -->







            </div>

        </div>
    </section>




    <section class="contact text-center" id="CONTACT">
        <div class="container">
            <h2>CONTACT US</h2>
            <!-- <p>Lorem ipsum dolor sit amet consectetur.</p> -->

            <form role="form" name="form" method="POST">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Your Name" name="name" require>
                        <span class="ERROR"><?php echo $error['name']?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Your E-Mail" name="email">
                        <span class="ERROR"><?php echo $error['email']?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Your Phone" name="phone">
                        <span class="ERROR"><?php echo $error['phone']?></span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <textarea placeholder="Your Meassage" class="form-control text" name="message"></textarea>
                    <span class="ERROR"><?php echo $error['message']?></span>
                </div>
                <input type="submit" name="sendMessage" class="Buttons" value="Send Meassage" onclick="">
            </form>


        </div>
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
    <script src="js/Home.js"></script>
    <script src="js/jssor.slider-27.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/Home.js"></script>
    <script src="js/jssor.slider-27.2.0.min.js" type="text/javascript"></script>
    <script src="js/swiper.min.js"></script>

</body>

</html>