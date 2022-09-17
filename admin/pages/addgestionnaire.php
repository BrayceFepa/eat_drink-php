<?php
require_once('../fonctions/traitement_gestionnaire.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EAT & DRINK SHOP</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}

.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="container bg-white rounded-top mt-5" id="zero-pad">
<div class="row d-flex justify-content-center">
<div class="col-lg-10 col-12 pt-3">
     <div class="d-flex">
                <div class="pt-1"><h4>EAT & DRINK SHOP</h4></div>
               
                <div class="ml-auto p-2"><a href="#"class="text-dark text-decoration-none" id="mobile-font"> Bienvenue <?php echo $_SESSION['nom_gestionnaire']; ?></a></div>
                <div class="p-2"><a href="fonctions/logout.php" class="text-dark text-decoration-none a" id="mobile-font">Logout</a></div>  
                
                                                        
            </div>
      
      <?php 
       if(isset($errors)){
           echo "<div class='alert alert-danger'>".$errors."</div>";
       }

       if(isset($success)){
           echo "<div class='alert alert-success'>".$success."</div>";
       }
      ?>
      <hr>
    <div class="col-md-10" style="margin:auto;">
        <form action="addgestionnaire.php" method="post">
            <h2 class="text-center">Creation gestionnaire</h2>       
           
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom" name="nom" required="required">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Prenom" name="prenom" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            </div>
            <div class="form-group">
                <button type="submit"  name="submit" class="btn btn-primary bg-dark btn-block">Sauvegarder</button>
            </div>
                  
        </form>
        
    </div>
</div>
</div>
</div>
 <script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
 <script type="text/javascript" src="../../js/jquery.min.js"></script>
</body>
</html>