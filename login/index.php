<?php
session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
  $user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  
  if($user_login->login($email,$upass))
  {
    $user_login->redirect('home.php');
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Kanti Bhuva</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate-custom.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
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
            <li><a href="../login/signup.php" class="smoothScroll">Sign Up</a></li>
            <li><a href="#login" class="smoothScroll"> Login</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>

  <div id="login" name="login">
    <div class="container">
      <?php 
      if(isset($_GET['inactive']))
      {
      ?>
        <div class='alert alert-error'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
        </div>
        <?php
      }
        ?>
      <form class="form-signin" method="post">
        <?php
        if(isset($_GET['error']))
        {
        ?>
        <div class='alert alert-success'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Wrong Details!</strong> 
        </div>
        <?php
        }
        ?>
        <div class="row">
          <h2 class="centered">LOGIN</h2><hr>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <input type="email" class="input-block-level form-control" placeholder="Email address" name="txtemail" required />
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <input type="password" class="input-block-level form-control" placeholder="Password" name="txtupass" required />
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group">
              <button class="btn btn-large btn-primary" type="submit" name="btn-login" style="float: left">Login</button>
              <a href="signup.php" style="background-color:#8a6d3b; float: right" class="btn btn-large">Sign Up</a>
            </div>
            <div class="col-lg-6 col-lg-offset-3 centered form-group" style="margin-top: 50px; margin-bottom: 14.5%;">
              <a href="fpass.php">Lost your Password ? </a>
            </div>
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
  </div>

</body>
</html>