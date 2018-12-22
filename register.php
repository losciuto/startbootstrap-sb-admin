<?php include('server.php') ?>
<?php
// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, trim($_POST['username']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $password_1 = mysqli_real_escape_string($db, trim($_POST['password_1']));
    $password_2 = mysqli_real_escape_string($db, trim($_POST['password_2']));
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username necessario");
    }
    if (empty($email)) {
        array_push($errors, "Email necessaria");
    }
    if (empty($password_1)) {
        array_push($errors, "Password necessaria");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Le due password non coincidono");
    }
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM presenze_utenti WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query) or die(mysqli_error($db));
    $user = mysqli_fetch_assoc($result);
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "L'utente inserito esiste già");
        }
        if ($user['email'] === $email) {
            array_push($errors, "L'indirizzo Email è già in archivio");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        echo $password;
        $query = "INSERT INTO presenze_utenti (nome, cognome, username, email, password, tipoutente, operatore)
        VALUES(' ', ' ', '$username', '$email', '$password','1','9')";
        mysqli_query($db, $query) or die(mysqli_error($db));
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Accesso avvenuto";
        header('location: login.php');
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
   <div class="card card-register mx-auto mt-5">
     <div class="card-header">Registrati</div>
     <div class="card-body">
       <form method="post" action="">
         <?php include('errors.php'); ?>
         <div class="form-group">
           <div class="form-row">
             <div class="col-md-12">
               <label for="exampleInputName">Username</label>
               <input class="form-control" id="exampleInputName" type="text"   name="username" value="<?php echo $username; ?>" required>
             </div>
           </div>
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Indirizzo Email</label>
           <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" name="email" value="<?php echo $email; ?>" required>
         </div>
         <div class="form-group">
           <div class="form-row">
             <div class="col-md-6">
               <label for="exampleInputPassword1">Password</label>
               <input class="form-control" id="exampleInputPassword1" type="password" name="password_1" required>
             </div>
            <div class="col-md-6">
               <label for="exampleInputPassword1">Conferma Password</label>
               <input class="form-control" id="exampleInputPassword2" type="password" name="password_2" required>
             </div>
           </div>
         </div>
          <button type="submit" class="btn btn-primary btn-block" name="reg_user">Conferma Registrazione</button>
       </form>
       <div class="text-center">
         <a class="d-block small mt-3" href="login.php">vai al Login</a>
       <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
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