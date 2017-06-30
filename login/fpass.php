<?php
session_start();
require_once 'class.user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
  $user->redirect('home.php');
}

if(isset($_POST['btn-submit']))
{
  $email = $_POST['txtemail'];
  
  $stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
  $stmt->execute(array(":email"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);  
  if($stmt->rowCount() == 1)
  {
    $id = base64_encode($row['userID']);
    $code = md5(uniqid(rand()));
    
    $stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
    $stmt->execute(array(":token"=>$code,"email"=>$email));
    
    $message= "
           Hello , $email
           <br /><br />
           We got requested to reset your password, if you do this then just click the following link to reset your password, if not just ignore                   this email,
           <br /><br />
           Click Following Link To Reset Your Password 
           <br /><br />
           <a href='http://www.kantibhuva.com/login/resetpass.php?id=$id&code=$code'>click here to reset your password</a>
           <br /><br />
           thank you :)
           ";
    $subject = "Password Reset";
    
    $user->send_mail($email,$message,$subject);
    
    $msg = "<div class='alert alert-success'>
          <button class='close' data-dismiss='alert'>&times;</button>
          We've sent an email to $email.
                    Please click on the password reset link in the email to generate new password. 
          </div>";
  }
  else
  {
    $msg = "<div class='alert alert-danger'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>Sorry!</strong>  this email not found. 
          </div>";
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
    <title>Forgot Password</title>
    
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
            <li><a href="../login/index.php" class="smoothScroll"> Login</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </div>
  </div>

    <div id="fpass" name="fpass">
    <div class="container">
      <form class="form-signin" method="post">
        <div class="row">
          <h2 class="centered">FORGOT PASSWORD</h2><hr>
        </div>
        
        
          <?php
      if(isset($msg))
      {
        echo $msg;
      }
      else
      {
        ?>
                <div class='alert alert-info'>
        Please enter your email address. You will receive a link to create a new password via email.!
        </div>  
                <?php
      }
      ?>
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3 centered form-group">
            <input type="email" class="input-block-level  form-control" placeholder="Email address" name="txtemail" required />
          </div>
          <div class="col-lg-6 col-lg-offset-3 centered form-group">
            <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generate new Password</button>
          </div>
          <div class="col-lg-6 col-lg-offset-3 centered form-group">
            <a href="index.php" style="background-color: #8a6d3b; margin-bottom: 29%;" class="btn btn-large">Login</a>
          </div>
        </div>
      </form>
    </div> <!-- /container -->

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