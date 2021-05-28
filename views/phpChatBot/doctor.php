<?php
session_start();
include('../phpexcel/Classes/PHPExcel.php');
include('database.inc.php');
include('check_login.php');

$tr = new getData();
$con = $tr->ketnoi_csdl();
$idQuestion = $_SESSION['idQuestion'];

?>
<?php
  
  $fullname = $_REQUEST['fullname'];
  $email = $_REQUEST['email'];
  $phonenumber = $_REQUEST['phone'];
  if (isset($_REQUEST['btnExport'])) {
      $sql = "select * from user where fullname = '$fullname' and email = '$email'  and sodienthoai = '$phonenumber' ";
      $kq = mysqli_query($con, $sql);
      $i = mysqli_num_rows($kq);
      if ($i == 1) {
          $row1 = mysqli_fetch_assoc($kq);
          $id_user = $row1['id'];
          $fullname = $row1['fullname'];
          $phone = $row1['sodienthoai'];
          $email = $row1['email'];

       

          /*  xuat file excel*/

          $objExcel = new PHPExcel;
          $objExcel->setActiveSheetIndex(0);
          $sheet = $objExcel->getActiveSheet()->setTitle('Kết quả chuẩn đoán');
          $objExcel->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(13);
          $sheet->getColumnDimension('A')->setAutoSize(true);
          $sheet->getColumnDimension('B')->setAutoSize(true);
          $sheet->getColumnDimension('C')->setAutoSize(true);
          /* $sheet->setStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); */
 
          $sheet->setCellValue('B1', 'Kết quả chuẩn đoán');
          $sheet->setCellValue('A2', 'Họ tên: '.$fullname.'');
          $sheet->setCellValue('A3', 'Email: '.$email.'');
          $sheet->setCellValue('A4', 'Số điện thoại: '.$phone.'');

         

          $rowCount = 5;
          $sheet->setCellValue('A'.$rowCount, 'Loại bệnh');
          $sheet->setCellValue('B'.$rowCount, 'Tên bệnh lân sàng');
          $sheet->setCellValue('C'.$rowCount, 'Câu trả lời');
         

          $sheet->setCellValue('A6', 'Bệnh về răng');
          $result = mysqli_query($con, "SELECT * FROM user_answer  WHERE id_user = ".$id_user." and ofuser = 'user' ");
          while ($row = mysqli_fetch_array($result)) {
              $rowCount++;
              $sheet->setCellValue('B'.$rowCount, $row['ten_trieuchung']);
              $sheet->setCellValue('C'.$rowCount, $row['type']);
          }
         

          $styleArray = array(
                      'borders'=>array(
                          'allborders'=>array(
                              'style' =>PHPExcel_Style_Border::BORDER_THIN
                          )
                      )
                          );
          $sheet->getStyle('A5:'.'C'.($rowCount))->applyFromArray($styleArray);
          $getbenh = mysqli_query($con, "SELECT * FROM user_answer  WHERE id_user = ".$id_user." and ofuser = 'bot_ketluan' ");
          $row_1 = mysqli_fetch_assoc($getbenh);
          $result_1 = $row_1['type'];
          $sheet->setCellValue('A'.($rowCount+1), 'Kết quả :'.$result_1.' ');

          $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
          $filename = 'new.xlsx';
          $objWriter->save($filename);

          header('Content-Disposition: attachment; filename="'.$filename.'"');
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Length: ' . filesize($filename));
          header('Content-Transfer-Encoding: binary');
          header('Cache-Control: must-revalidate');
          header('Pragma: no-cache');
          readfile($filename);
          return;
      } else {
          echo '<script language="javascript">alert("Bệnh nhân không tồn tại!")</script>';
          echo "<script languae='javascript'>window.location.href='doctor.php'</script>";
      }
  }
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
    <!-- doctor -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="css/doctor.css" rel="stylesheet">
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
                        <a href="logout.php?key=logout" class="btn-style-one">Đăng xuất</a>
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

<form action="" method="post">
    <div class="form-detail">
      <div class="form-info col-md-6 col-xs-12">
        <div class="group">      
          <input class="control-custom" type="text" name = "fullname"/>
          <span class="bar"></span>
          <label>Full name</label>
        </div>
        <div class="group">      
          <input class="control-custom" type="text" name = "email"/>
          <span class="bar"></span>
          <label>Email</label>
        </div>
        <div class="group">      
          <input class="control-custom" type="text" name = "phone"/>
          <span class="bar"></span>
          <label>Phone</label>
        </div>
      </div>
      
    </div>
    <div class="form-button text-center">
      <button class="btn btn-info" name = "btnExport" type="submit">Submit</button>
    </div>
</form>  

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