<?php
require('connect.php');
?>
 
 <!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Sign Up</title>
       <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/pingan_icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<!--body-->
<body class="bg-light">
    <div class="main-wraper">

    <!-- Header -->
    <div class="header bg-gradient-pink py-7 py-lg-4 pt-lg-2">
      <div class="container">
        <div class="header-body text-center mb-9">
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-4 col-md-6 px-5">
              <image src="assets/img/brand/logo.png" type="image/png" height="170px" width="400px">
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-fel" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>

<!--Content-->
<div class="container mt--9 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-4">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
        <h2>เพิ่มพนักงาน</h2>
        <p>กำหนด username เเละ password</p>
        <form role="form">

        <!--username-->
        <form action="regist.php" method="post">
            <div class="form-group">
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                        </div>
                            <input type="text" name="username"  placeholder="username" class="form-control ">
                    </div> 
                 </div>
            </div>  
<!--password-->
            <div class="form-group">
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                            <input type="password" name="password" placeholder="password" class="form-control 
                            <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger my-4" value="Submit" name="save">
                <input type="reset" class="btn btn-secondary my-4" value="Reset">
            </div>
            <p>มีบัญชีอยู่เเล้ว? <a href="login.php" class="text-danger ">คลิ้กที่นี่เพื่อเข้าสู่ระบบ</a>.</p>
        </form>
    </div>    
</body>
</html>

