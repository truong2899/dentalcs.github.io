<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include('database.inc.php');
include('../login_form/check_login.php');
error_reporting(0);
$tr = new getData();
$con = $tr->ketnoi_csdl();
$idQuestion = $_SESSION['idQuestion'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>PHP Chatbot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   
     <!-- mobile responsive meta -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
     <!-- Slick Carousel -->
     <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/slick/slick-theme.css">
    <!-- FancyBox -->
    <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  
    <!-- Stylesheets -->
     <link href="css/style.css" rel="stylesheet">
  
     <!--Favicon-->
     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="page-wrapper">
<div class="header-top">
      <div class="container clearfix">
            <div class="top-left">
                  <h6>Opening Hours : Saturday to Tuesday - 8am to 10pm</h6>
            </div>
            <div class="top-right">
                  <ul class="social-links">
                        <li>
                              <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                        </li>
                  </ul>
            </div>
      </div>
</div>
<section class="header-uper">
      <div class="container clearfix">
            <div class="logo">
                  <figure>
                        <a href="../web/index.php">
                              <img src="images/logo.png" alt="" width="130">
                        </a>
                  </figure>
            </div>
            <div class="right-side">
                  <ul class="contact-info">
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-envelope-o"></i>
                              </div>
                              <strong>Email</strong>
                              <br>
                              <a href="#">
                                    <span>info@medic.com</span>
                              </a>
                        </li>
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                              </div>
                              <strong>Call Now</strong>
                              <br>
                              <span>+ (88017) - 123 - 4567</span>
                        </li>
                  </ul>
                  <?php
               
               if (isset($username) && isset($phanquyen)) {
                   echo ' <div class="link-btn">
                        <a href="../login_form/logout.php?key=logout" class="btn-style-one">Đăng xuất</a>
                  </div>';
               } else {
                   echo ' <div class="link-btn">
                <a href="../login_form/login_user.php" class="btn-style-one">Login</a>
          </div>
          <div class="link-btn">
                <a href="../login_form/signup_user.php" class="btn-style-one">Signup</a>
          </div>';
               }
               ?> 
                 
            </div>
      </div>
</section>

<div class="hero-slider">
    <!-- Slider Item -->
    <div class="slider-item slide1" style="background-image:url(images/slider/slider-bg-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content style text-center">
                        <h2 class="text-white text-bold mb-2">Our Best Surgeons</h2>
                        <p class="tag-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel sunt animi sequi ratione quod at earum. <br>
                             Quis quos officiis numquam!</p>
                        <a href="#" class="btn btn-main btn-white">explore</a>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Item -->
    <div class="slider-item" style="background-image:url(images/slider/slider-bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start-->
                    <div class="content style text-right">
                        <h2 class="text-white">We Care About <br>Your Health</h2>
                        <p class="tag-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                        <a href="#" class="btn btn-main btn-white">about us</a>
                    </div>
                    <!-- Slide Content End-->
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Item -->
    <div class="slider-item" style="background-image:url(images/slider/slider-bg-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Slide Content Start -->
                    <div class="content text-center style">
                        <h2 class="text-white text-bold mb-2">Best Medical Services</h2>
                        <p class="tag-text mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae deserunt, 
                            <br>eius pariatur minus itaque nostrum.</p>
                        <a href="shop.html" class="btn btn-main btn-white">shop now</a>
                    </div>
                    <!-- Slide Content End -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:20px;margin-top:20px">
        <div class="row justify-content-md-center mb-4">
            <div class="col-md-10">
            
                <?php
                    if (isset($user_id)) {
                        echo '  <div style = "margin-bottom:20px"><h2 align="center">Xin Chào '.$fullname.';!</h2></div>            <div class="card">
                        <div class="card-body messages-box">
                        
                        <input  type = "hidden" id="id_user" value = " '.$user_id.'" />
                        <input  type = "hidden" id="idQuestion" value = "'. $idQuestion.'" />
                        <div class = "answer">
                        
                        </div>
                        </div>
                      
                        <div class="card-header">
                            <div class="input-group">
                                <input id="input-me9" type="text" name="messages" class="form-control input-sm"
                                    placeholder="Type your message here..." />
                               <!--  <span class="input-group-append">
                                    <input type="button" class="btn btn-primary" value="Send" onclick="send_msg(9);" />
                                </span> -->
                            </div>
                            <div class="link-btn" style= "text-align:center;margin-top:10px">
                                   <a href="reConsult.php?key=reconsult" class="btn-style-one">Tư vấn lại</a>
                             </div>
                        </div>
                    </div>';
                    } else {
                        echo ' <div style = "margin-bottom:20px"><h2 align="center">Xin Chào hãy<a href="../login_form/login_user.php"> đăng nhập</a> để được tư vấn!</h2></div>';
                    }
                ?>
   
                <!--end code-->
            </div>
        </div>
    </div>

    <footer class="footer-main">
  
  <div class="footer-bottom">
    <div class="container clearfix">
      <div class="copyright-text">
        <p>&copy; Copyright 2018. All Rights Reserved by
          <a href="index.html">Medic</a>
        </p>
      </div>
      <ul class="footer-bottom-link">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="about.html">About</a>
        </li>
        <li>
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
</div>
    
    <script type="text/javascript">
    $(document).ready(function() {
        
        fetch_user_chat_history();
        getAnswer();
        
           
           
        
       
    });



    function send_msg(id) {
         jQuery('.ans').hide(); 
        var id_user = jQuery('#id_user').val();
        var txt = jQuery('#input-me' + id).val();
         var html =
             '<li class="messages-me clearfix"><span class="message-img" style = "float:left"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title"></strong>  </div><p class="messages-p">' +
             txt + '</p></div></li>';
         jQuery('.messages-list').append(html);
         jQuery('#input-me' + id).val(''); 
         var idQuestion = jQuery('#idQuestion').val();  

        
       
            jQuery.ajax({
                url: 'get_bot_message.php',
                type: 'post',
                data: {'txt':txt , 'id_user':id_user,'id':id },
                success: function(data) {
                    console.log(data);
                    /*  var html =
                         '<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes"></span></small> </div><p class="messages-p">' +
                         data +
                         '</p></div></li>'; */
                    jQuery('.messages-box').append(data);
                   /*  jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight); */
                    jQuery('.ans').hide();
                
                 
                    location.reload(true);
                   
                   
                 
                    
                   

                }

            });

            
        
      }
    //ham show messeger history
    function fetch_user_chat_history() {
        
      var id_user = jQuery('#id_user').val();
        $.ajax({
            url: "get_chat_history.php",
            method: "POST",
            data: {'id_user':id_user },
            success: function(data) {
                /*  $html. = '<input id = "input-me'.$i.
                 '" name = "ans[]" class = "ans"  type="button" class="btn btn-primary" value="'.$data.
                 '"   onclick="send_msg('.$i.
                 ');"/>'; */
                $('.answer').append(data);
                document.getElementById('input-me9').scrollIntoView();
               
            }
        });
    }

    function getAnswer() {

         var idQuestion = jQuery('#idQuestion').val(); 
     
    
          $.ajax({
            url: "answer.php",
            method: "POST",
            data: {'idQuestion':idQuestion},
            success: function(data) {
                console.log(data);
              $('.messages-box').append(data);
              
             
            }

        });
        
      
    }
    </script>

<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>

<script src="plugins/jquery.js"></script>
<script src="plugins/bootstrap.min.js"></script>
<script src="plugins/bootstrap-select.min.js"></script>
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- FancyBox -->
<script src="plugins/fancybox/jquery.fancybox.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
<script src="plugins/google-map/gmap.js"></script>

<script src="plugins/validate.js"></script>
<script src="plugins/wow.js"></script>
<script src="plugins/jquery-ui.js"></script>
<script src="plugins/timePicker.js"></script>
<script src="js/script.js"></script>
</body>

</html>