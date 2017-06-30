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
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Kanti Bhuva | Sun Services</title>

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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
          <li><a href="#home" class="smoothScroll">Home</a></li>
          <li><a href="#about" class="smoothScroll"> About</a></li>
          <li><a href="#services" class="smoothScroll"> Services</a></li>
          <li><a href="#portfolio" class="smoothScroll"> Portfolio</a></li>
          <li><a href="#download" class="smoothScroll"> Download</a></li>
          <li><a href="#contact" class="smoothScroll"> Contact</a></li>
          <li>
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-user"></i><big><b><?php echo $row['userName']; ?></b></big><i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a tabindex="-1" href="logout.php">Logout</a>
                </li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>

<!-- ==== HEADERWRAP ==== -->
<div id="home" name="home">
  <div id="headerwrap">
  <header class="clearfix"> 
  <i class="fa text-shadow fa-desktop icon"></i>
    <div class="text-white">
      
    <h1>Creative &amp; High Quality </h1>
    <h2 >Computer Hardware assurance.</h2>
    </div>  
    <a href="#portfolio" class="smoothScroll btn btn-lg">See, what I do..</a> </header>
  </div>
</div>
<!-- /headerwrap --> 

<!-- ==== ABOUT ==== -->
<div id="about" name="about">
  <div class="container">
    <div class="row white">
      <h2 class="centered">ABOUT ME</h2>
      <hr>
      <div class="col-md-6"> <img class="img-responsive" src="../img/about/about1.jpg" align=""> </div>
      <div class="col-md-6">
        <h3>Who I am !</h3>
        <p class="bigmeP">I'm Kanti Bhuva. An Engineer specialized is Computer Hardware-devices and Networking. I Repair any kind of hardware fault in Electronic devices specially related to computers like Printers, MotherBoards etc. </p>
        <br>
        <h3>Why to choose me ?</h3>
        <p class="bigmeP">I've Experience in this field since 10 years and more. Also I've done specialization in Networking field.</p>
      </div>
    </div>
    <!-- row --> 
  </div>
</div>
<!-- container --> 

<!-- ==== SERVICES ==== -->
<div id="services" name="services">
  <div class="container">
    <div class="row">
      <h2 class="centered">SERVICES</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2">
        
      </div>
      <div class="col-lg-4 callout"> <i class="fa fa-desktop fa-3x"></i>
        <h3>Computer Repairs</h3>
        
      </div>
      <div class="col-lg-4 callout"> <i class="fa fa-gears fa-3x"></i>
        <h3>Hardware Replacement</h3>
        
      </div>
      <div class="col-lg-4 callout"> <i class="fa fa-dot-circle-o fa-3x"></i>
        <h3>Networking</h3>
      </div>
    </div>
    <!-- row --> 
  </div>
</div>
<!-- container --> 

<!-- ==== PORTFOLIO ==== -->
<div id="portfolio" name="portfolio">
  <div class="container">
    <div class="row">
      <h2 class="centered">PORTFOLIO</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2 centered">
        <p class="large">Here are some of devices I'm expert in..</p>
      </div>
    </div>
    <!-- /row -->
    <div class="container">
      <div class="row"> 
        
        <!-- PORTFOLIO IMAGE 1 -->
        <div class="col-md-4 ">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/advanced-computer.jpg" alt="">
              <figcaption>
                <h5>Laptops</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
        
        <!-- MODAL SHOW THE PORTFOLIO IMAGE. In this demo, all links point to this modal. You should create
                  a modal for each of your projects. -->
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Project Title</h4>
              </div>
              <div class="modal-body">
                <!-- <p><img class="img-responsive" src="img/portfolio/folio01-preview.jpg" alt=""></p> -->
                <p>Lorem ipsum dolor sit amet, quo meis audire placerat eu, te eos porro veniam. An everti maiorum detracto mea. Eu eos dicam voluptaria, erant bonorum albucius et per, ei sapientem accommodare est. Saepe dolorum constituam ei vel</p>
                <p><b><a href="#">Visit Site</a></b></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content --> 
          </div>
          <!-- /.modal-dialog --> 
        </div>
        <!-- /.modal --> 
        
        <!-- PORTFOLIO IMAGE 2 -->
        <div class="col-md-4">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/motherboard.jpg" alt="">
              <figcaption>
                <h5>Motherboards</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
        
        <!-- PORTFOLIO IMAGE 3 -->
        <div class="col-md-4">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/display.jpg" alt="">
              <figcaption>
                <h5>Displays</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
      </div>
      <!-- /row --> 
      
      <!-- PORTFOLIO IMAGE 4 -->
      <div class="row">
        <!-- PORTFOLIO IMAGE 5 -->
        <div class="col-md-4">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/hdd.png" alt="">
              <figcaption>
                <h5>Harddrives</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
        
        <div class="col-md-4 ">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/printer.jpg" alt="">
              <figcaption>
                <h5>Printers</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
        
       
        <!-- PORTFOLIO IMAGE 6 -->
        <div class="col-md-4">
          <div class="grid mask">
            <figure> <img class="img-responsive" src="../img/portfolio/computer_repair.png" alt="">
              <figcaption>
                <h5>Processing Units</h5>
                <!-- <a data-toggle="modal" href="#myModal" class="btn btn-default">More Details</a> </figcaption> -->
              <!-- /figcaption --> 
            </figure>
            <!-- /figure --> 
          </div>
          <!-- /grid-mask --> 
        </div>
        <!-- /col --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /row --> 
  </div>
</div>
<!-- /container --> 

<!-- ==== DOWNLOAD ==== -->
<div id="download" name="download">
  <div class="container">
    <div class="row">
      <h2 class="centered">DOWNLOAD</h2>
      <hr>
      <div class="col-lg-8 col-lg-offset-2">
    
      </div>
      <div class="col-lg-8  col-lg-offset-2">
        <ul>
          <li>
            <a href="download/resize.zip"><span>JPeG File Resize</span> </a>
          </li>
          <li>
            <a href="download/SCANNER_Install.zip"><span>Custom Sizes Photos For JPeG format</span></a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>TIF To JPG Converter</span> </a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>PCX To JPG Converter</span></a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>Self Ping Not Working Solution</span> </a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>All Print Job Delete</span></a>
          </li>
          <li>
            <a href="download/IESetting.zip"><span>IE Setting</span> </a>
          </li>
          <li>
            <a href="download/kgb.zip"><span>Web Site Block</span></a>
          </li>
          <li>
            <a href="download/Spooler%20Repair%20Tool.zip"><span>Spooler Repair Tool</span> </a>
          </li>
          <li>
            <a href="download/Windows_XP_32_bit.zip"><span>Terminal Services for xp 32 Bit</span></a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>Terminal Services for xp 64 Bit</span> </a>
          </li>
          <li>
            <a href="download/Windows_7_32_bit.zip"><span>Terminal Services for Windows 7 32 Bit</span></a>
          </li>
          <li>
            <a href="download/Windows_7_64_bit.zip"><span>Terminal Services for Windows 7 64 Bit</span> </a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>Terminal Services for Windows 8 32 & 64 Bit</span></a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>Terminal Services for Windows 8.1 32 & 64 Bit</span> </a>
          </li>
          <li>
            <a href="download/coming soon.html"><span>>Disable / Enable Explorer Auto Arrange</span></a>
          </li>
          <li>
            <a href="download/Wep_5235_xp.zip"><span>Wep LQ DSI 5235 Printer Driver For XP (32 Bit)</span> </a>
          </li>
          <li>
            <a href="download/Wep_5235_7_32.zip"><span>Wep LQ DSI 5235 Printer Driver For Win-7 (32 Bit)</span></a>
          </li>
          <li>
            <a href="download/Wep_5235_7_64.zip"><span>Wep LQ DSI 5235 Printer Driver For Win-7 (64 Bit)</span> </a>
          </li>
          <li>
            <a href="download/FX2175_win7_32.exe"><span>Epson FX 2175 Printer Driver For Win-7 (32 Bit)</span></a>
          </li>
          <li>
            <a href="download/FX2175_win7_64.exe"><span>Epson FX 2175 Printer Driver For Win-7 (64 Bit)</span> </a>
          </li>
          <li>
            <a href="download/FX2175_win8_32.exe"><span>Epson FX 2175 Printer Driver For Win-8 (32 Bit)</span></a>
          </li>
          <li>
            <a href="download/FX2175_win8_64.exe"><span>Epson FX 2175 Printer Driver For Win-8 (64 Bit)</span> </a>
          </li>
          <li>
            <a href="download/RENEWUSB.zip"><span>RENEWUSB</span></a>
          </li>
          <li>
            <a href="download/Printcontrol_new.ZIP"><span>PRINTCONTROL-NEW</span></a>
          </li>
          <li>
            <a href="download/NovellClient4_90.exe"><span>Novell Client Download</span> </a>
          </li>
          <li>
            <a href="download/AA_v3.5.zip"><span>Ammyy Admin 3.5 Download</span></a>
          </li>
        </ul>
      </div>
    </div>
    <!-- row --> 
  </div>
</div>
<!-- container --> 

<!-- ==== CONTACT ==== -->
<div id="contact" name="contact">
  <div class="container">
    <div class="row">
      <h2 class="centered">CONTACT ME</h2>
      <hr>
      <div class="col-md-4 centered"> <i class="fa fa-map-marker fa-2x"></i>
        <p>21, Indrajit Park,
           Nikol Gam Road,
          Nr, Sardar Mall
          Ahmedabad - 382350</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-envelope-o fa-2x"></i>
        <p>support@kantibhuva.com</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-phone fa-2x"></i>
        <p> +91 9913092695</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 centered">
        <!-- <p>.</p> -->
        <form name="sentMessage" id="contactForm" class="form" novalidate>
          <div class="row">
            <div class="col-xs-6 col-md-6 form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
            <div class="col-xs-6 col-md-6 form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="form-group">
            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button class="btn btn btn-lg" id="btnx" type="submit">Send Message</button>        </form>
        <!-- form --> 
      </div>
    </div>
    <!-- row --> 
    
  </div>
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

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript" src="../js/bootstrap.min.js"></script> 
<script type="text/javascript" src="../js/retina.js"></script> 
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
<script type="text/javascript" src="../js/smoothscroll.js"></script> 
<script type="text/javascript" src="../js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="../js/contact_me.js"></script> 
<script type="text/javascript" src="../js/jquery-func.js"></script>
<script type="text/javascript" src="../js/application.js"></script>
</body>
</html>
