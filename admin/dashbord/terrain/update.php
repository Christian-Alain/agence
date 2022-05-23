<?php

require '../../config.php';


if(!empty($_GET['id'])) 
{
    $id = checkInput($_GET['id']);
}

// declaration des variable d'erreur
$titreError =$lieuError = $prixError = $fileError = $descriptionError = "";

if(!empty($_POST)) 
{
    $titre               = checkInput($_POST['titre']);
    $description        = checkInput($_POST['description']);
    $prix              = checkInput($_POST['prix']);
    $lieu           = checkInput($_POST['lieu']); 
    $image              = checkInput($_FILES["image"]["name"]);
    $imagePath          = '../images/'. basename($image);
    $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
    $isSuccess          = true;
   
    // on verifie si les champs sont vide alors on affiche une erreur
    if(empty($titre)) 
    {
        $titreError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($description)) 
    {
        $descriptionError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    } 
    if(empty($prix)) 
    {
        $prixError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    } 
     
    if(empty($lieu)) 
    {
        $lieuError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
    {
        $isImageUpdated = false;
    }
    else
    {
        $isImageUpdated = true;
        $isUploadSuccess =true;
        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
        {
            $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if(file_exists($imagePath)) 
        {
            $imageError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if($_FILES["image"]["size"] > 500000) 
        {
            $imageError = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if($isUploadSuccess) 
        {
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
            {
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            } 
        } 
    }
     
    if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
    { 
        // $db = Database::connect();
        if($isImageUpdated)
        {
            $statement = $acces->prepare("UPDATE terrain  set titre = ?, description = ?, prix = ?, lieu = ?, image = ? WHERE id = ?");
            $statement->execute(array($titre,$description,$prix,$lieu,$image,$id));
        }
        else
        {
            $statement = $acces->prepare("UPDATE terrain  set titre = ?, description = ?, prix = ?, lieu = ? WHERE id = ?");
            $statement->execute(array($titre,$description,$prix,$lieu,$id));
        }
        // Database::disconnect();
        header("Location: terrain_crud.php");
    }
    else if($isImageUpdated && !$isUploadSuccess)
    {
        // $db = Database::connect();
        $statement = $acces->prepare("SELECT * FROM terrain where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $image          = $item['image'];
        // Database::disconnect();
       
    }
}
else 
{
    // $db = Database::connect();
    $statement = $acces->prepare("SELECT * FROM terrain where id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    $titre           = $item['titre'];
    $description    = $item['description'];
    $prix          = $item['prix'];
    $lieu       = $item['lieu'];
    $image          = $item['image'];
    // Database::disconnect();
    
}

// fonction pour securiser les donnée enter par l'utilisateur
// fail XSS
function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="terrain_crud.php">
                                        <div class="sb-nav-link-icon"></div>
                                        Terrains
                                    </a>
                                    <a class="nav-link" href="../logement_crud.php">
                                        <div class="sb-nav-link-icon"></div>
                                        Logements
                                    </a>
                                    <a class="nav-link" href="../conseil/coneil_crud.php">
                                        <div class="sb-nav-link-icon"></div>
                                        Conseils
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tableau de Bord</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de Bord</li>
                        </ol>
                        
                        <div class="row">
                        </div>
                        <form method="post" role="form" action="<?php echo 'update.php?id='.$id;?>  enctype="multipart/form-data">
                                
                                <div class="form-group col-md-6 form-floating mb-2">
                                    <input class="form-control" name="titre" id="inputEmail" type="text" value="<?php echo $titre;?>"  autocomplete="off" />
                                    <label for="inputEmail">Titre</label>
                                    <span class="help-inline"><?php echo $titreError;?></span>
                                </div>   
                                <div class="col-md-6 form-floating mb-3">
                                    <input class="form-control" name="lieu" value="<?php echo $lieu;?>" id="inputEmail" type="text"  autocomplete="off"/>
                                    <label for="inputEmail">Lieu</label>
                                    <span class="help-inline"><?php echo $lieuError;?></span>
                                </div>
                                <!-- <div class="row mb-3"> -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" name="prix" value="<?php echo $prix;?>" id="inputPassword" type="number"  autocomplete="off"/>
                                            <label for="inputPassword">Prix</label>
                                            <span class="help-inline"><?php echo $prixError;?></span>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="col-md-6 mb-3 ">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <label for="image">Image:</label>
                                            <p><?php echo $image;?></p>
                                            <input type="file" name="image" value="<?php echo $image;?>" id="inputPasswordConfirm">
                                            <div>
                                                 <label for="inputPasswordConfirm">Selectionner une nouvelle image</label>
                                            </div>
                                            <span class="help-inline"><?php echo $fileError;?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea name="description" value="<?php echo $description;?>" id="inputPassword" cols="100" rows="20"></textarea>
                                            <label for="inputPassword">Description</label>
                                            <span class="help-inline"><?php echo $descriptionError;?></span>
                                        </div>
                                        
                                    </div>
                                <!-- </div> -->
                                <div class="d-flex align-items-center  mt-4 mb-0 ">
                                    <div class="d-grid p-3"><input type="submit" name="creat" class="btn btn-primary btn-block" value="Ajouter"/></div>
                                    <div class="d-grid p-3"><input type="reset" name="creat" class="btn btn-danger btn-block" value="Annuler"/></div>
                                </div>
                            </form>
                    </div>
                </main>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
