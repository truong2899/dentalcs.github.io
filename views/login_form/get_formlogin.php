<?php
error_reporting(0);
  $username = $_REQUEST['username'];
 
  $pass = $_REQUEST['password'];

  if (isset($_POST['login-submit'])) {
      $ketnoi = $tr->ketnoi_csdl();
      $pass_md5 = md5($pass);

      $sql = "select * from user where username = '$username' and password = '$pass_md5'";
      
      $kq = mysqli_query($ketnoi, $sql);
      $i = mysqli_num_rows($kq);
      if ($i==1) {
          while ($row= mysqli_fetch_array($kq)) {
              $id = $row['id'];
              $fullname = $row['fullname'];
              $username1 = $row['username'];
              $password = $row['password'];
              $email = $row['email'];
            
              $phanquyen = $row['phanquyen'];
             
              session_start();
              $_SESSION['user_id']=$id;
              $_SESSION['fullname'] = $fullname;
              $_SESSION['username']=$username1;
              $_SESSION['password']=$password;
              $_SESSION['email']=$email;
              $_SESSION['phanquyen']=$phanquyen;

              /* $sub_query = "
              INSERT INTO login_details
              (id_user)
              VALUES ('".$id."')
              "; */
              /*   mysqli_query($ketnoi, $sub_query);
                $_SESSION['login_details_id'] = mysqli_insert_id($ketnoi)   ; */
          }
          if ($phanquyen == 1) {
              header('location:../phpChatBot/doctor.php');
          }
          if ($phanquyen == 2) {
              header('location:../Admin/index.php');
          } elseif ($phanquyen == 0) {
              echo $previous =  $_POST['http'];
              echo "<script languae='javascript'>window.location.href=' $previous'</script>";
          }
      } else {
          echo '<script language="javascript">alert("Tài khoản không chính xác")</script>';
      }
  }
