

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="dashbord/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Creation de Compte</h3></div>
                                    <div class="card-body">
                                    <?php 
                                                if(isset($_GET['reg_err']))
                                                {
                                                    $err = htmlspecialchars($_GET['reg_err']);

                                                    switch($err)
                                                    {
                                                        case 'success':
                                                        ?>
                                                            <div class="alert alert-success">
                                                                <strong>Succès</strong> inscription réussie !
                                                            </div>
                                                        <?php
                                                        break;

                                                        case 'password':
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Erreur</strong> mot de passe différent
                                                            </div>
                                                        <?php
                                                        break;

                                                        case 'email':
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Erreur</strong> email non valide
                                                            </div>
                                                        <?php
                                                        break;

                                                        case 'email_length':
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Erreur</strong> email trop long
                                                            </div>
                                                        <?php 
                                                        break;

                                                        case 'nom_length':
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Erreur</strong> pseudo trop long
                                                            </div>
                                                        <?php 
                                                        case 'already':
                                                        ?>
                                                            <div class="alert alert-danger">
                                                                <strong>Erreur</strong> compte deja existant
                                                            </div>
                                                        <?php 

                                                    }
                                                }
                                              ?>
                                        <form method="post" action="inscription_traitement.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="nom" id="inputEmail" type="text" placeholder="Jean Pierre" required="required" autocomplete="off" />
                                                <label for="inputEmail">Nom</label>
                                                
                                            </div> 
                                               
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="text" placeholder="name@example.com" required="required" autocomplete="off"/>
                                                <label for="inputEmail">Adresse Email</label>
                                                
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" required="required" autocomplete="off"/>
                                                        <label for="inputPassword">Mot de Passe</label>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password2" id="inputPasswordConfirm" type="password" placeholder="Confirm password" required="required" autocomplete="off"/>
                                                        <label for="inputPasswordConfirm">Confirm Mot de Passe</label>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" name="creat" class="btn btn-primary btn-block" value="Creer un Compte"/></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dashbors/js/scripts.js"></script>
    </body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire de connexion en HTML & CSS - Frenchcoder</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
  <form method="post" action="">
     
    <h1>Se connecter</h1>
    <div class="inputs">
      <input type="text" name="nom" placeholder="Nom" />
      <input type="email" name="email" placeholder="Email" />
      <input type="password" name="motdepasse1" placeholder="Mot de passe" />
      <input type="password" name="motdepasse2" placeholder="Mot de passe">
    </div>
    
    <div align="center">
      <button type="submit" name="submit">Se connecter</button>
    </div>
  </form>
</body>
</html> -->



<?php

  // $erreur=""; 
  // $message="";

  //   require('config.php');

  //  if(isset($_POST['creat'])){
  //   // On verifie si les champs sont vide
  //   if(empty($_POST['nom']) AND empty($_POST['email']) AND empty($_POST['motdepasse1']) AND empty($_POST['motdepasse2'])){
  //     $erreur ="Complèter tous les champs.";
  //   }else{
  //     // Declaration des variable
  //     $nom = htmlspecialchars($_POST['nom']);
  //     $email = htmlspecialchars($_POST['email']);
  //     $mdp_user = $_POST['motdepasse1'];
  //     $mdp_user2 = $_POST['motdepasse2'];
  //     $mail_regex ='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  //     $mdp_regex = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/'; 
  //     $nom_regex = '/^[a-zA-Z0-9]$/';

  //     $nomlength = strlen($nom);

  //     if(!($nomlength <= 100) && !(preg_match($nom_regex, $nom)) ){
  //       $erreur ="Votre nom doit contenis des chiffres.";
  //     }else{
  //          $reqnom = $acces->prepare("SELECT * FROM user WHERE nom = ?");
  //          $reqnom->execute(array($nom));
  //          $nomexist = $reqnom->rowCount();

  //         if($nomexist != 0){
  //           $erreur = "Nom deja utiliser.";
  //         }else{

  //           if(!(filter_var($email, FILTER_VALIDATE_EMAIL)) && !preg_match($regex, $email)){
  //             $erreur = "Votre email est invalide.";
  //           }else{
  //             $reqemail = $acces->prepare("SELECT * FROM user WHERE email = ?");
  //             $reqemail->execute(array($email));
  //             $emailexist = $reqemail->rowCount();

  //             if($emailexist != 0){
  //               $erreur = "Email deja utiliser.";
  //             }else{

  //               if(!($mdp_user == $mdp_user2) AND !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,50}$/', $mdp_user)){
  //                 $erreur ="Mot de passe sont pas identique.";
  //               }else{

  //                   $mdp_user =  password_hash($mdp_user, PASSWORD_DEFAULT);
  //                    $mdp_user2 =  password_hash($mdp_user2, PASSWORD_DEFAULT);
  //                    $insert_user = $acces->prepare("INSERT INTO user(nom, email, motdepasse) values(?, ?, ?)");
  //                    $insert_user ->execute(array($nom, $email, $mdp_user));
  //                    $message ="Inscription reussis";
  //                   //  header("location:connexion.php");
  //               }
  //             }
  //           }
  //         }
  //     }
  //   }
  //  }
?>

<?php
 
//  require('config.php');
//  $erreur=""; 
//  $message="";
 
// if(isset($_POST['creat'])){
//   $nom = htmlspecialchars($_POST['nom']);
//   $email = htmlspecialchars($_POST['email']);
//   $motdepasse1 = $_POST['motdepasse1'];
//   $motdepasse2 = $_POST['motdepasse2'];
  
// //  $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
//  $regex_email = '/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';

//   if (!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['motdepasse1']) AND !empty($_POST['motdepasse2'])){
//    $nomlength = strlen($nom);
   
//        if ($nomlength <= 100) {
//          $reqnom = $acces->prepare("SELECT * FROM user WHERE nom = ?");
//          $reqnom->execute(array($nom));
//          $nomexist = $reqnom->rowCount();

//          if($nomexist == 0){

          


//              if(preg_match($regex_email, $email)){

//              $reqemail = $acces->prepare("SELECT * FROM user WHERE email = ?");
//              $reqemail->execute(array($email));
//              $emailexist = $reqemail->rowCount();

//              if($emailexist == 0){

//                  if($motdepasse1 == $motdepasse2){

//                    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,50}$/', $motdepasse1)){  

//                    $motdepasse1 =  password_hash($motdepasse1, PASSWORD_DEFAULT);
//                    $motdepasse2 =  password_hash($motdepasse2, PASSWORD_DEFAULT);
//                    $insertad = $acces->prepare("INSERT INTO user(nom, email, motdepasse) values(?, ?, ?)");
//                    $insertad ->execute(array($nom, $email, $motdepasse1));
//                    $message ="connexion reussis";
//                   //  header("location:connexion.php");
//                    }
//                    else{
//                      $erreur ="votre mot de passe doit contenir des lettres et chiffres";
//                    }
//                  }
//                else{
//                  $erreur ="mauvais mot de passe";
//                }
//              }
//              else{
//                $erreur ="mail exist deja";
//              }

//              }
//              else{
//                $erreur ="adresse non valide";
//              }
//            }
//            else{
//              $erreur ="mail invalide";
//            }
         
//      }
//      else{
//        $erreur ="nom invalid";
//      }
 

// }
// else{
//   $erreur ="Champs obligatoire";
// }  


// }



?>