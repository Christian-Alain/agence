

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="dashbord/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <?php 
                                        if(isset($_GET['login_err']))
                                        {
                                            $err = htmlspecialchars($_GET['login_err']);

                                            switch($err)
                                            {
                                                case 'password':
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Erreur</strong> mot de passe incorrect
                                                    </div>
                                                <?php
                                                break;

                                                case 'email':
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Erreur</strong> email incorrect
                                                    </div>
                                                <?php
                                                break;

                                                case 'already':
                                                ?>
                                                    <div class="alert alert-danger">
                                                        <strong>Erreur</strong> compte non existant
                                                    </div>
                                                <?php
                                                break;
                                            }
                                        }
                                        ?> 
                                        <form method="post" action="connexion_traitement.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" required="required" autocomplete="off"/>
                                                <label for="inputEmail">Adresse Email</label>
                                                <!-- <span style="color:red;"><?php //echo $erreur; ?></span> -->
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" required="required" autocomplete="off" />
                                                <label for="inputPassword">Mot de Passe</label>
                                                <!-- <span style="color:red;"><?php //echo $erreur; ?></span> -->
                                            </div>
                                            
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary" name="login" value="connexion"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
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
        <script src="dashbord/js/scripts.js"></script>
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
  <form method="POST" action="">
     
    <h1>Se connecter</h1>
    <div class="inputs">
      <input type="email" name="mailconnect" placeholder="Email" />
      <input type="password" name="mdpconnect" placeholder="Mot de passe">
    </div>
    
    <div align="center">
      <button type="submit" name="login">Se connecter</button>
    </div>
  </form>
</body>
</html> -->



<?php
  // session_start();

  // $erreur =""; 
  // $message = "";
  // require('config.php');
  // if(isset($_POST['login'])){

  //   $mailconnect = htmlspecialchars($_POST['mailconnect']);
  //   $mdpconnect = $_POST['mdpconnect'];

  //   if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])){
      
  //     if($acces == true){
  //       $requser = $acces->prepare("SELECT * FROM user WHERE email = ? AND motdepasse = ?");
  //       $requser->execute(array($mailconnect, $mdpconnect));
  //       $userexist = $requser->rowCount(); 

  //         $userinfo = $requser-> fetch();
  //         if($userexist == true){

  //           $hash = $userinfo[0];
  //           if(password_verify($_POST['mdpconnect'], $userexist->motdepasse)){
         
                
  //                 $_SESSION['id'] = $userinfo['id'];
  //                 $_SESSION['email'] = $userinfo['email'];
  //                 $_SESSION['motdepasse'] = $userinfo['motdepasse'];
  //                 $message ="login succes";
  //                 header("location:dashbord.php");


               
  //         }
  //         else{
  //           $erreur ="Mauvais email ou mot de passe !!!!!!";
  //         }
  //       }
  //       else{
  //         $erreur ="utilisateur invalid !";
  //       }
  //     }
  //     else{
  //       $erreur ="Erreur de connexion a la base de donné !";
  //     }
  //   }
  //   else{
  //     $erreur ="Vous devez remplis tous les champs !";
  //   }
  // }



?>

<?php
  // session_start();
  // require('config.php');

  // if(isset($_POST['login'])){

  //   if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])){
  //     $user_mail = htmlspecialchars($_POST['mailconnect']);
  //     $user_mdp = $_POST['mdpconnect'];

  //     $requette = $acces -> prepare("SELECT * FROM user WHERE email = ? AND motdepasse = ?");
  //     $requette->execute(array($user_mail, $user_mdp));
  //     $user = $requette->fetch();

  //     $user_mdp = password_hash($user_mdp, PASSWORD_DEFAULT);
  //     if($user['motdepass'] == $user_mdp){

  //       echo "connexion reussis.";
  //       // $_SESSION['mailconnect'] = $user_mail;
  //       // $_SESSION['mdpconnect'] = $user_mdp;
  //       // // $_SESSION['id'] = $requette->fetch()['id'];
  //       // echo $_SESSION['id'];
  //     }else{
  //       echo "votre email et mot de passe incorrect.";
  //     }
  //   }else{
  //     echo "Veuillez completer tous les champs";
  //   }
  // }


?>


<?php
//  session_start();
//  require('config.php');

//  $erreur = "";
//  $message = "";
//  $login = $_POST['login'];
//  $mailconnect = htmlspecialchars($_POST['mailconnect']);
//  $mdpconnect = $_POST['mdpconnect'];
 

//  if(isset($login, $mailconnect, $mdpconnect) && !empty($mailconnect) && !empty($mdpconnect)){

//     if(filter_var($mailconnect, FILTER_VALIDATE_EMAIL)){
//       $reqMailExistConnect = $acces->prepare("SELECT * FROM WHERE email = ?");
//       $reqMailExistConnect ->execute(array($_POST['mailconnect']));
     
//     //  if($reqMailExistConnect->execute()){
//       $checkMailConnect = $reqMailExistConnect->fetch();

//         if(!$checkMailConnect){
//           $erreur = "Email n'existe pas.";
//         }else{
//           if(!password_verify($mailconnect, $checkMailConnect['motdepasse'])){
//             $erreur = "Email ou mot de passe incorrect";
//           }else{
//             $_SESSION['user_connect'] = [
//                 "id" => $checkMailConnect['id'],
//                 "email" => $checkMailConnect['email'],
//                 "motdepasse" => $checkMailConnect['motdepasse'],
//             ];
//             $message = "Vous etes connecté.";
//           }
//         }
//       // }
//     }
//  }else{
//   $erreur = "Veuillez remplis tous les champs.";
// }
?>



<?php

// session_start();

// require('config.php');
// $error ="";

//   if(isset($_POST['login'])){
//     if(empty($_POST['mailconnect'])){
//       $erreur ="Le champ username est vide.";
//     }else{
//       if(empty($_POST['mdpconnect'])){
//         $erreur ="Le champ mot de passe est vide.";
//       }
//       else{
//         // declaration de variables
//         $mail_user = $_POST['mailconnect'];
//         $mdp_user = $_POST['mdpconnect'];

//         // connexion a la BDD

//         if(!$acces){
//           $erreur ="Erreur de connexion a la base de donné";
//         }else{
//           // requette de lecture de donné dans la BDD

//           $requette = $acces->prepare("SELECT * FROM user WHERE email = ? AND motdepasse = ?");
//           $requette->execute(array($mail_user, $mdp_user));
//           // $resultat = $requette ->rowCount();
//           // $resultat = $requette -> fetch();
//             if($requette->rowCount > 0)
          
//           if(!$resultat){
//             $erreur ="Utilisatuer incorrect.";
//           }else{

//             if(password_verify($mdp_user, $requette->motdepasse)){

//                   $_SESSION['id'] = $resultat['id'];
//                   $_SESSION['email'] = $resultat['email'];
//                   $_SESSION['motdepasse'] = $resultat['motdepasse'];
//                   $message ="login succes";
//                   header("location:dashbord.php");
//                   exit();

//             }
//           }
//         }
//       }
//     }
//   }

?>

<?php
  // session_start();
  // require('config.php');

  // if(isset($_POST['login'])){

  //   if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])){
  //       $user_mail = htmlspecialchars($_POST['mailconnect']);
  //     $user_mdp = $_POST['mdpconnect'];

  //     $requette = $acces -> prepare("SELECT email, motdepasse FROM user WHERE email = ? AND motdepasse = ?");
  //     $requette->execute(array($user_mail, $user_mdp));
  //     $userExist = $requette->rowCount();
  //     $user = $requette->fetch();
  //     // if($userExist == 1){
  //       if($user && password_verify($user_mdp, $user['motdepasse'])){

  //           // $user = $requette->fetch();
  //           echo "reussis";
  //       }else{
  //           echo "!!!!!!!!!";
  //       }

  //     // }
  //     // else{
  //     //   echo "mauvais email ou mot de passe";
  //     // }
  //   }
  //   else{
  //       echo "A remplis";
  //   }
  // }


?>


