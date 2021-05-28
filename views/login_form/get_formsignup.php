<?php
    error_reporting(0);
    $fullname = $_REQUEST['fullname'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $conf_pass = $_REQUEST['confirm-password'];
    $phonenumber = $_REQUEST['phonenumber'];
    if (isset($_POST['nut_dangki'])) {
        $ketnoi = $tr->ketnoi_csdl();
        $pass_md5 = md5($pass);
        $sql = "select * from user where username = '$username' or email = '$email' ";
        $kq = mysqli_query($ketnoi, $sql);
        $i = mysqli_num_rows($kq);
        
        if ($i>0) {
            echo '<script languae="javascript">alert("Tài khoản  đã tồn tại!")</script>';
        } else {
            $sql = "insert into user 
            values(null,'$fullname','$username','$pass_md5','$email','$phonenumber',0)";
            if (mysqli_query($ketnoi, $sql)) {
                echo '<script languae="javascript">alert("Đăng kí tài khoản thành công!")</script>';
                echo '<script languae="javascript">window.location.href="../web/index.php"</script>';
            }
        }
        /*  */
    }
