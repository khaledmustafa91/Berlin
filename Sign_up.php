<?php
session_start();
$errors = ['First_Name'=>'','Last_Name'=>'','Email'=>'','password'=>'','credit_card'=>'','Phone'=>'','Address'=>''];
$First_Name = '';
$Last_Name =  ''; 
$Email = '';
$password =   ''; 
$Facebook =   ''; 
$twitter =    ''; 
$credit_card= '';  
$Phone =      '';  
$Address =    ''; 
echo $First_Name;
include("config/database_connection.php");
if(isset($_POST['submit'])){
  
  $First_Name = mysqli_real_escape_string($conn,$_POST['fname']);
  $Last_Name = mysqli_real_escape_string($conn,$_POST['lname']);
  $Email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['pass']);
  $Facebook = mysqli_real_escape_string($conn,$_POST['facebook']);
  $twitter = mysqli_real_escape_string($conn,$_POST['twitter']);
  $credit_card = mysqli_real_escape_string($conn,$_POST['credit']);
  $Phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $Address = mysqli_real_escape_string($conn,$_POST['address']);
  //$Picture = mysqli_real_escape_string($conn,$_POST['fileToUpload']);
  if(!empty($_FILES["fileToUpload"]["tmp_name"])){
    $Picture = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));  
  }
  if( empty($First_Name) ){
     $errors['First_Name'] = "Fill your First name";
  }
  if( empty($Last_Name) ){
    $errors['Last_Name'] = "Fill your Last name";
  }
  if( empty($Email) ){
    $errors['Email'] = "Fill your Email";
  }
  if( empty($password) ){
    $errors['password'] = "Fill your password";
  }
  if( empty($credit_card) ){
    $errors['credit_card'] = "Fill your credit card";
  }
  if( empty($Phone) ){
    $errors['Phone'] = "Fill your Phone";
  }
  if( empty($Address) ){
    $errors['Address'] = "Fill your Address";
  }


  $sql = "SELECT * from profile where Email='$Email'";
  
  $result = mysqli_query($conn/*database Connection*/ ,$sql /* query will ran on the data base*/); 
  $userResult = mysqli_fetch_assoc($result);
  if(!$userResult){
    if(!array_filter($errors))
    {
      echo $First_Name . " " . $Last_Name ." " .  $Email ." " .  $password ." " .  $Facebook ." " .  $twitter ." " .  $credit_card . " " . $Phone ." " .  $Address . "<br />";
      $sql = "INSERT INTO profile(First_Name, Last_Name, Email, pass, Facebook, twitter, credit_card, Phone, addr,Profile_picture)  VALUES ('$First_Name','$Last_Name','$Email','$password','$Facebook','$twitter','$credit_card','$Phone','$Address','$Picture')";
      
      if(mysqli_query($conn,$sql)){
        $message = "Sign up has successfully done";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: home.php');
      }else{
        echo "query error : " . mysqli_error($conn);
      }
    }
  }else{
    $message = "This email is already signed up";
    echo "<script type='text/javascript'>alert('$message');</script>";
  
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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/Sign_in.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Home.css">
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
        .ERROR{
          color:red;
          font-size:12px;
        }

      </style>
  </head>
  <body >

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
                    <li class=""><a href="Profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
                    <li class="active"><a href="Sign_up.php">Sign Up</a></li>

                    <li>
                        <a href="Sign_in.php" type="" data-toggle="" data-target="#">
                            Sign in <?php //echo ( $_SESSION['First_Name'] == "") ? "Sign In": "Hello " . $_SESSION['First_Name']; ?></a>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <img src="img/sign/team.png" class="img-responsive images">
      <h2 class="text-center">Log in</h2>
      </div>
      <div class="modal-body">
        <form class="navbar-form navbar-right">
                    <div class="input-group">
            <span class="input-group-addon " id="sizing-addon1"><i class="fas fa-portrait"></i></span>
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>

        <br> <br>

        <div class="input-group">
          <span class="input-group-addon" id="sizing-addon1"><i class="fas fa-lock-open"></i></span>
          <input type="text" class="form-control Fixed" placeholder="Password" aria-describedby="basic-addon1">
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



  <div class="loader">
      <img src="img/Global/Plane Loader.gif">
    </div>
    

    <section class="Sign">
      
      <!-- multistep form -->
<form id="msform" method="POST" enctype="multipart/form-data">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset class="first-filed">
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" placeholder="Email" value = "<?php echo $Email ?>" />
    <span class="ERROR"><?php echo $errors['Email']; ?></span>

    <input type="password" name="pass" placeholder="Password" />
    <span class="ERROR"><?php echo $errors['password']; ?></span>

    <input type="password" name="cpass" placeholder="Confirm Password" />
    <span class="ERROR"><?php echo $errors['password']; ?></span>

    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" value = "<?php echo $twitter ?>"/>
    
    <input type="text" name="facebook" placeholder="Facebook" value = "<?php echo $Facebook ?>"/>
    <input type="number" name="credit" placeholder="Credit Card" value = "<?php echo $credit_card ?>"/>
    <span class="ERROR"><?php echo $errors['credit_card']; ?></span>
    
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>


  <fieldset class="second-filed">
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" value = "<?php echo $First_Name ?>"/>
    <span class="ERROR"><?php echo $errors['First_Name']; ?></span>

    <input type="text" name="lname" placeholder="Last Name" value = "<?php echo $Last_Name ?>"/>
    <span class="ERROR"><?php echo $errors['Last_Name']; ?></span>

    <input type="text" name="phone" placeholder="Phone" value = "<?php echo $Phone ?>"/>
    <span class="ERROR"><?php echo $errors['Phone']; ?></span>

    <textarea name="address" placeholder="Address" value = "<?php echo $Address ?>"></textarea>
    <span class="ERROR"><?php echo $errors['Address']; ?></span>

    <label for="">Profile picture</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>


</form>


    </section>

    <div class="theworld"></div>

<!-- 
<footer>

<div class="container">
    <div class="row">
      

    <div class="col-lg-4">

    <h1>Your Company</h1>

    </div>
       
    <div class="col-lg-4">
      <h2>Pages</h2>
        <ul class="FOOTER">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Package</a></li>
        <li><a href="#">Profile</a></li> 
        <li><a href="Sign in.html" class="active">Sign In</a></li> 
      </ul>
    </div>

<div class="col-md-3 footerCol">
            <div class="footerWidget">
              <h2 class="footerWidgeTitle">Social Icons</h2>
              
              <p class="footerMediaBtns footerWidgeTitle">
                <a href="https://www.facebook.com/IEEEBenhaUnivSB/">
                  <i class="fa fa-facebook"></i>
                </a>

                <a href="https://twitter.com/IEEEBUSB">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>

                <a href="https://www.instagram.com/ieee_benha/">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>

                <a href="https://www.linkedin.com/in/ieee-benha-university-sb-646509b6/">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </p>
            </div>
          </div>


    </div>

    </div>


    <p id="copyrights">© Abo ElKhalaled. All copyright reserved.</p>


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
