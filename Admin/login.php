<?php 
 include('../dbConnection.php');
 session_start();
 if(!isset($_SESSION['is_adminlogin'])){
  if(isset($_REQUEST['aEmail'])){
   $aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
   $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));
   $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '".$aEmail."' AND a_password = '".$aPassword."' limit 1";
   $result = $conn->query($sql);
   if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = true;
    $_SESSION['aEmail'] = $aEmail;
    echo "<script> location.href='dashboard.php';</script>";
    exit;
   } else {
    $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
   }
  }
 } else {
  echo "<script> location.href='dashboard.php';</script>";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <style>
  .custom-margin {
   margin-top: 8vh;
  }
 </style>

 <title>Login</title>
</head>
<body>
 <div class="mb-3 mt-5 text-center" style="font-size: 30px;">
            <img src="../images/icon.png" width="100px" height="100px" alt="">

  <i class="fas fa-stethoscope"></i>
  <span>Online Service Management System</span>
 </div>
 <p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-danger"></i>Admin Area (Demo)</p>
 <div class="container-fluid">
  <div class="row justify-content-center custom-margin">
   <div class="col-sm-6 col-md-4">
    <form action="" class="shadow-lg p-4" method="POST">
     <div class="form-group">
      <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="aEmail">
      <small class="form-text">We'll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
      <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="aPassword">
     </div>
     <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>
     <?php if(isset($msg)) {echo $msg;} ?>
    </form>
    <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
   </div>
  </div>
 </div>
   <!-- Start Footer -->
 <footer class="container-fluid bg-dark mt-5 text-white">
  <div class="container">
   <div class="row py-3">
    <div class="col-md-6 text-right"> <!-- Start 2nd Column -->
      <p>&copy; 2025 CyberAli-eng and Ali Khusroo Bin Sabir</p>
    </div> <!-- End 2nd Column -->
   </div>
  </div>
 </footer>

 <!-- JavaScript Files -->
 <script src="../js/jquery.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/all.min.js"></script>
</body>
</html>