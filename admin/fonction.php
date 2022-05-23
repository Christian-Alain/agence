<?php

/********************* 

Creation de toutes les fontions pour le CRUD de l'Application

**********************/


/*********************

    START CRUD de Terrain 

 ********************/

function ajouterTerrain($image, $titre, $descrip, $prix, $lieu)
{
    if(require('config.php'))
    {
        $req = $acces->prepare("INSERT INTO terrain(image, titre, descrip, prix, lieu) VALUE($image, $titre, $descrip, $prix, $lieu)");
        $req->execute(array($image, $titre, $descrip, $prix, $lieu));

        $req->closeCursor();
    }
}

function afficheTerrain()
{
    if(require('config.php'))
    {
        $req = $acces->prepare("SELECT * FROM terrain ORDER BY id DESC LIMIT 0,1");
        $req->execute();
        $data =$req->fetchAll(PDO::FETCH_OBJ);

        return $data;
        $req->closeCursor();
    }
}

function supprimeTerrain($id)
{
    if(require('config.php'))
    {
        $req = $acces->prepare("DELETE * FROM terrain WHERE id=?");
        $req->execute(array($id));

    }
}

/***********************

    END CRUD de Terrain 

 **********************/

/*********************

   START CRUD de Logement 

 ********************/

function ajouterLogement($image, $titre, $descrip, $prix, $lieu)
{
    if(require('config.php'))
    {
        $req = $acces->prepare("INSERT INTO logement(image, titre, descrip, prix, lieu) VALUE($image, $titre, $descrip, $prix, $lieu)");
        $req->execute(array($image, $titre, $descrip, $prix, $lieu));

        $req->closeCursor();
    }
}

function afficheLogement()
{
    if(require('../config.php'))
    {
        $req = $acces->prepare("SELECT * FROM logement ORDER BY id DESC");
        $req->execute();
        $data =$req->fetchAll(PDO::FETCH_OBJ);

        return $data;
        $req->closeCursor();
    }
}

function supprimeLogement($id)
{
    if(require('../config.php'))
    {
        $req = $acces->prepare("DELETE * FROM logement WHERE id=?");
        $req->execute(array($id));

    }
}

/***********************

    END CRUD de Logement 

 **********************/


?>