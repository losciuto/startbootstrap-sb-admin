<?php include('server.php') ?>
<?php

// LOGIN USER
if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($username)) {
        array_push($errors, "Username necessario");
    }
    if (empty($password)) {
        array_push($errors, "Password necessaria");
    }
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM presenze_utenti WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_row($results);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $row[0];
            $_SESSION['usertype'] = $row['5'];
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Accesso consentito";
            header('location: index.php');
            
        } else {
            array_push($errors, "Dati incoerenti.");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>PXLM - Gestione Presenze Personale</title>
 <!-- Bootstrap core CSS-->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom fonts for this template-->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!-- Custom styles for this template-->
 <link href="css/sb-admin.css" rel="stylesheet">
<style>
body{
  background-image: url("img/sfondopresenze.png");  
  background-repeat: no-repeat;
  background-size: cover;
}
.container {
  
  width : 100%;
  height: 100%;
  display: block;
  position: relative;
}
.container::after{
  content: "";
  background-image: url("img/sfondopresenze.png");  
  background-repeat: no-repeat;
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
</style>
</head>
<body class="bg-dark">
 <div class="container">
   <div class="card card-login mx-auto mt-5">
     <div class="card-header">Login Gestione Presenze</div>
     <div class="card-body">
       <form method="post" action="">
          <?php include('errors.php'); ?>
         <div class="form-group">
           <label for="exampleInputEmail1">Username</label>
           <input class="form-control"  type="text" name="username" value="<?= $_SESSION['username'] ?>" required>
         </div>
         <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
           <input class="form-control"  type="password" name="password" required>
         </div>
         <div class="form-group">
         
           <div class="form-check">
             <label class="form-check-label">
              <!-- <input class="form-check-input" type="checkbox"> Ricordami la Password -->
              </label>
           </div>
         </div>
         
         <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
       </form>
       <div class="text-center">
         <a class="d-block small mt-3" href="register.php">Registrati come Utente</a>
      <!-- <a class="d-block small" href="forgot-password.php">Forgot Password?</a>-->
       </div>
     </div>
   </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>