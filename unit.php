<?php include('connect.php')?>
<?php
    session_start();

    if(!isset($_SESSION['username'])){
      echo "<script>
      alert('กรุณาเข้าสู่ระบบก่อน..');
      window.location.replace('login_page.php');
      </script>";
    }

    if (isset($_GET['logout'])){
      session_destroy();
      unset($_SESSION['username']);
      echo "<script>
      alert('ออกจากระบบสำเร็จ');
      window.location.replace('login_page.php');
      </script>";
    }

    if($_SESSION['emp_level'] == "พนักงาน" ){
      echo "<script>
      alert('คุณไม่มีสิทธิ์เข้าถึงเนื้อหานี้..');
      window.location.replace('index_employee.php');
      </script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Pingan Backend</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/pingan_icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <!--Modal-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" <?php
          if($_SESSION['emp_level'] == "พนักงาน" ){
            ?> href="index_employee.php" <?php
          }else{
            ?> href="index_manager.php" <?php
          } ?> >
            <img src="assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="Dashboard.php">
                <i class="ni ni-tv-2 text-orange"></i>
                <span class="nav-link-text">ภาพรวม</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="billhistory.php">
                <i class="fas fa-history text-orange"></i>
                <span class="nav-link-text">รายการประวัติ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active">
                <i class="fas fa-warehouse text-orange"></i>
                <span class="nav-link-text">คลังสินค้า</span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="emp.php">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">พนักงาน</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="report.php">
                <i class="fas fa-paste text-orange"></i>
                <span class="nav-link-text">รายงาน</span>
              </a>
            </li>
            <br>
            <li class="nav-item">
              <a class="nav-link" a href="index_manager.php?logout='1'">
                <i class="fas fa-sign-out-alt text-orange"></i>
                <span class="nav-link-text" >ออกจากระบบ</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-danger border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <div class="media align-items-center">
                <div class="media-body  ml-2 mt-1 mb-1 d-none d-lg-block">
                  <span class="mb-0 text-sm text-light">ชื่อผู้ใช้ : <?php echo $_SESSION['emp_name']," ",$_SESSION['emp_surname'] ?></span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-danger pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row"><div class="col-xl-1"></div><!-- แทน col-xl-10 center เพราะทับกับ Modal -->
        <div class="col-xl-10">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <!-- Tabs List -->
                <div class="table-responsive">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" href="warehouse.php"><i class="fas fa-warehouse"></i> สินค้าคงคลัง</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="stock_in.php"><i class="fas fa-file-import"></i> รับเข้าสินค้า</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="stock_out.php"><i class="fas fa-file-export"></i> เบิกสินค้า</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="editstock.php"><i class="fas fa-cubes"></i> ปรับสต็อก</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="product.php"><i class="fas fa-list"></i> รายการสินค้า</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="category.php"><i class="fas fa-adjust"></i> หมวดหมู่</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active"><i class="fas fa-ruler-vertical"></i> หน่วยนับ</a>
                    </li>
                  </ul>
                  <!-- Modal Button -->
                  <table class="table-white col-xl-12">
                    <tr>
                      <td align="left">
                        <div class="col-xl-12"><br>
                          <h6 class="mb-0">รายละเอียด</h6><br>
                        </div>
                      </td>
                      <td align="right">
                        <div class="col-xl-12">
                          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#unit_add_modal">
                            <span><i class="fas fa-plus"></i> เพิ่มหน่วยนับ</span>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <!-- Projects table -->
                <div class="table-responsive table-white table-striped">
                  <table class="table align-items-center table-flush">
                    <tr class="thead-light" align="center">
                      <th><h6 class="text-gray text-ml mb-0">ลำดับ</h6></th>
                      <th><h6 class="text-gray text-ml mb-0">รหัสหน่วยนับ</h6></th>
                      <th><h6 class="text-gray text-ml mb-0">ชื่อหน่วยนับ</h6></th>
                      <th><h6 class="text-gray text-ml mb-0">จำนวนแพ็ค</h6></th>
                      <th><h6 class="text-gray text-ml mb-0">จำนวนชิ้น</h6></th>
                      <th><h6 class="text-gray text-ml mb-0">ตัวเลือก</h6></th>
                    </tr>
                    <?php
                      require 'connect.php';
                      $query = mysqli_query($conn, "SELECT * FROM unit ORDER BY unit_id ASC") or die(mysqli_error());
                      $x = 1;
                      while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr align="center">
                      <td><?php echo $x; $x++; ?></td>
                      <td><?php echo $fetch['unit_id']?></td>
                      <td><?php echo $fetch['unit_name']?></td>
                      <td><?php echo $fetch['unit_pack']?></td>
                      <td><?php echo $fetch['unit_piece']?></td>
                      <td>
                        <!-- Update Button -->
                        <button type="button" class="btn btn-outline-warning btn-sm text-black" data-toggle="modal" data-target="#unit_update_modal<?php echo $fetch['unit_id']?>">
                          <span><i class="far fa-edit"></i> แก้ไข</span>
                        </button>
                        <!-- Delete Button -->
                        <a href="unit_delete.php?unit_id=<?php echo $fetch['unit_id']?>"
                          <?php
                            echo "onclick=\"return confirm('คุณต้องการลบข้อมูลนี้ใช้หรือไม่')\" ";
                          ?>
                        >
                          <button class='btn btn-outline-danger btn-sm '><span><i class="far fa-trash-alt"></i> ลบ</span></button>
                        </a>
                      </td>
                    </tr>
                    <?php
                        include 'unit_update.php';
                      }
                    ?>
                  </table>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Modal Unit Add -->
    <div class="modal fade" id="unit_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">เพิ่มหน่วยนับ</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="unit.php" class="was-validated">
              <?php require('runid.php'); ?>
              <?php require('unit_duplicate_name.php'); ?>
              <table class="col-xl-9 center">
                <tr>
                  <td align="right">รหัสหน่วยนับ : &nbsp</td>
                  <td>
                    <input type="text" name="unit_id" value="<?php echo $unit_id; ?>" class="form-control" disabled='disabled'>
                    <input type="hidden" name="unit_id" value="<?php echo $unit_id; ?>">
                  </td>
                </tr>
                <tr>
                  <td align="right">ชื่อหน่วยนับ : &nbsp</td>
                  <td><input type="text" name="unit_name" class="form-control" required></td>
                </tr>
                <tr>
                  <td align="right">จำนวนแพ็ค : &nbsp</td>
                  <td><input type="number" name="unit_pack" class="form-control" required></td>
                </tr>
                <tr>
                  <td align="right">จำนวนชิ้นต่อแพ็ค : &nbsp</td>
                  <td><input type="number" name="unit_piece" class="form-control" required></td>
                </tr>
              </table><br>
              <center>
                <button type="submit" class= "btn btn-outline-success" name="save">บันทึก</button>
                <button type="reset" class="btn btn-outline-warning" name="reset">เคลีย</button>
              </center>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ปิด</button>
          </div>   
        </div>
      </div>
    </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>