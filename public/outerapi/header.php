<?php include 'config.php';
    $siderror=false;
     if(isset($_GET['sid'])){
        $sid=$_GET['sid']; 
        $sidname=PDO_FetchOne("select name from personalinfo where userid=?",[$sid]);
        
        if(!$sidname)
            $siderror=true;
     }
     else
        $siderror=true;
     ?>
<!doctype html>
<html lang="en">

<head>
    <title>COINEX - Crypto Currency HTML Template </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;Ubuntu:400,500,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup/magnific-popup.css" />
    <!-- owl-carousel CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl-carousel/owl.carousel.css" />
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <!-- Ionicons CSS -->
    <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" type="text/css" href="css/flaticon.css">
    <!-- Shop CSS -->
    <link rel="stylesheet" type="text/css" href="css/shop.css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="revslider/css/settings.css">
    <!-- style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    
   
</head>

<body>
    <!-- loading -->
    <div id="loading">
        <div id="loading-center">
            <img src="images/loader.gif" alt="loder">
        </div>
    </div>
    <!-- loading End -->
    <!-- Header -->
    <header class="simpal-yellow">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-phone text-blue"></i> +0123 456 789</li>
                                <li class="list-inline-item"><i class="fa fa-envelope-o"> </i> support@coinex.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="topbar-right text-right">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <ul class="list-inline iq-left">
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="modal" data-target=".iq-login" data-whatever="@mdo"><i class="fa fa-lock"></i>Login</a></li>
                                        <?php 
                                            if(!$siderror){ ?>
                                             <li class="list-inline-item">/</li>
                                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="modal" data-target=".iq-register" data-whatever="@fat"><i class="fa fa-user"></i>Register</a></li>
                                        <?php }?>
                                        
                                    </ul>
                                </li>
                                <li class="list-inline-item"><a href="javascript:void(0)"><i class="fa fa-comments-o"></i>Free Consulting</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="index.php"><img id="logo_dark" class="img-fluid" src="images/logo.png" alt="logo"></a>
                        </div>
                        <nav> <a id="resp-menu" class="responsive-menu" href="javascript:void(0)"><i class="fa fa-reorder"></i> Menu</a>
                            <ul class="menu text-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="service.php">Services</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="clearfix"></div>