<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

<?php

  include_once'connectdb.php';
  session_start();

  if(isset($_POST['btn_login'])){
    $useremail=$_POST['txt_email'];
    $password=$_POST['txt_password'];

    //echo $useremail." - ".$password;

    $select=$pdo->prepare("select * from tbl_user where useremail='$useremail' AND password='$password'");
    $select->execute();

    $row=$select->fetch(PDO::FETCH_ASSOC);

    if($row['useremail']==$useremail AND $row['password']==$password AND $row['role']="Admin"){

      $_SESSION['userid']=$row['userid'];
      $_SESSION['username']=$row['username'];
        $_SESSION['useremail']=$row['useremail'];
        $_SESSION['role']=$row['role'];

      echo'<script type="text/javascript">
      jQuery(function validation(){
        
          Swal.fire({
            icon: "success",
            title: "Good job! '.$_SESSION['username'].'",
            text: "Details Matched",
          });
        
      });
        </script>';

      header('refresh:1;dashboard.php');


    }else if($row['useremail']==$useremail AND $row['password']==$password AND $row['role']="User"){
    
      $_SESSION['userid']=$row['userid'];
      $_SESSION['username']=$row['username'];
      $_SESSION['useremail']=$row['useremail'];
      $_SESSION['role']=$row['role'];


      echo'<script type="text/javascript">
      jQuery(function validation(){

        Swal.fire({
          icon: "success",
          title: "Good job! '.$_SESSION['username'].'",
          text: "Details Matched",
        });
      
    });
        </script>';
    
      header('refresh:1;user.php');
    }
    

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Little Brand Box | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Little Brand Box</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="txt_email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="txt_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <a href="#" onclick="swal.fire('To get password', 'Please contact admin','error');">I forgot my password</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
       
      </p>
      <p class="mb-0">
       
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


</body>
</html>
