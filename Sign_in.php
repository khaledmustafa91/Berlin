<?php

//echo $_SESSION['First_Name'];

include("config/database_connection.php");

$error="";
  $id="";
  if(isset($_POST['submit'])){
    //session_start();

    //$_SESSION['user'] = $_POST['user'];
    

    //header("Location: Profile.php");

    //echo $_POST['user'];
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    //echo $name . "<br/>";
    //echo $pass . "<br/>";
    $sql = "SELECT * from profile where Email='$name' and pass='$pass';";
    
    $result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
    $userResult = mysqli_fetch_assoc($result);
    if($userResult){

      session_start();
     // echo "user exist";
  //     $id = $userResult['id'];
      
      $_SESSION['user'] = $userResult['Last_Name'];
      
  // //$_SESSION['user'] = $userResult['First_Name']; ;
      $id =  $userResult['id'];
      $_SESSION['id'] = $userResult['id'];
      $_SESSION['First_Name'] = $userResult['First_Name'];
      $_SESSION['Last_Name'] = $userResult['Last_Name'];
      $_SESSION['Email'] = $userResult['Email'];
      $_SESSION['Phone'] = $userResult['Phone'];
      $_SESSION['credit_card'] = $userResult['credit_card'];
      $_SESSION['Profile_picture'] = $userResult['Profile_picture'];


      //echo $_SESSION['id'];
      header("Location: Profile.php?id=$id");
      mysqli_free_result($result);


      //echo '<img src="data:image/jpg;base64,'.base64_encode($userResult['Profile_picture'] ).'" height="200" width="200"/>';
 
    }
    else{
     // echo "user is not exist !";
      $error ="user is not exist !";
    }
    
    
    // Close connection
    mysqli_close($conn);

  }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Sign_in.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/Global.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
          body{
            background-image: none;
          }
      </style>
  </head>
  <body >

 <!-- Header -->

<!--
********************************************************************
* Responsive Transparent Navbar
********************************************************************
-->
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


              <li > <a href="home.php">Home </a> </li>
              <li><a href="Package.php">Package <span class="sr-only">(current)</span></a></li>
              <li class=""><a href="Profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
              <li><a href="Sign_up.php">Sign Up</a></li>

              <li class="active">
                  <a href="Sign_in.html" type="" data-toggle="" data-target="#"> Sign in <?php //echo ( $_SESSION['First_Name'] == "") ? "Sign In": "Hello " . $_SESSION['First_Name']; ?></a>
              </li>

          </ul>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<section class="banner">

  <div class="loader">
      <img src="img/Global/Plane Loader.gif">
    </div>
    <div class="containers"> 
       <div class="Forms"> 
           <img src="img/Package/AlsterPanorama.jpg" class="img-responsive"> 
        </div>

    <div class="con container text-center">
      <h2 >Sign In</h2> <br>

      <img src="img/sign/team.png" class="img-responsive images">
                    
       <form method="POST" class="text-center">
        <div class="input-group input-group-md">
          <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-portrait"></i></span>
          <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" name="user">
        </div>
        <br>
          <div class="input-group input-group-md">
            <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-lock-open"></i></span>
            <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1" name="pass">
          </div>
          <br>
          <a href=""><p>Forget Username or Password</p></a>
        <input class="Buttons" type="submit" name="submit" value = "Sign in"><span style="margin-left: 5px;">or <a id ="Sign" href="Sign_up.php">Sign Up </a></span>
      </fom>
      <p style="color:red;"> <?php echo $error ?> </p>
      
    </div>
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
</footer>

 -->











  

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
  </body>
</html>
