<?php
session_start();
require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
  $reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
  $uname = trim($_POST['txtuname']);
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtpass']);
  $code = md5(uniqid(rand()));
  
  $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
  $stmt->execute(array(":email_id"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($stmt->rowCount() > 0)
  {
    $msg = "
          <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry !</strong>  email allready exists , Please Try another one
        </div>
        ";
  }
  else
  {
    if($reg_user->register($uname,$email,$upass,$code))
    {     
      $id = $reg_user->lasdID();    
      $key = base64_encode($id);
      $id = $key;
      
      $message = "          
            Hello $uname,
            <br /><br />
            Welcome to Kantibhuva.com!<br/>
            To complete your registration  please , just click following link<br/>
            <br /><br />
            <a href='http://www.kantibhuva.com/login/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
            <br /><br />
            Thanks,";
            
      $subject = "Confirm Registration";
            
      $reg_user->send_mail($email,$message,$subject); 
      $msg = "
          <div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
            </div>
          ";
    }
    else
    {
      echo "sorry , Query could no execute...";
    }   
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signup | Kanti Bhuva</title>
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate-custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
     <link href="../css/main.css" rel="stylesheet">
    <script src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/modernizr.custom.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

  </head>
  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  <div id="navbar-main"> 
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand smoothScroll" href="#home">Sun Services</a> </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#signup" class="smoothScroll">Sign Up</a></li>
            <li><a href="../login/index.php" class="smoothScroll"> Login</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>

  <div id="signup" name="signup">
    <div class="container">
        <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <div class="row">
          <h2 class="centered">SIGN UP</h2><hr>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <input type="text" class="input-block-level form-control" placeholder="Name" name="txtuname" required />
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
                <input type="email" class="input-block-level form-control" placeholder="Email address" name="txtemail" required />
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <input type="password" class="input-block-level form-control" placeholder="Password" name="txtpass" required />
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <button class="btn btn-large btn-primary" type="submit" name="btn-signup" style="float: left">Sign Up</button>
              <a href="index.php" style="background-color: #8a6d3b; float: right; margin-bottom: 31.8%;" class="btn btn-large">Login</a>
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              
            </div>
        </div>
      </form>
    </div> <!-- /container -->
  </div>


  
  <!-- container -->

  <div id="footerwrap">
    <div class="container">
    <div class="row">
      <div class="col-md-8"> 
        <span class="copyright">Copyright &copy; 2016 <a href="ftp://kantibhuva.com" class="urlextern" title="ftp://kantibhuva.com" rel="nofollow">Kanti Bhuva.</a> Design by <a rel="nofollow">Devang Bhuva</a></span>
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
    </div>
  </div>

  </body>
</html>