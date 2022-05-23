<?php
   try
   {
     $acces = new PDO('mysql:host=localhost;dbname=immobi_db;','root','');
   }
   catch(PDOException $e)
   {
       die('Erreur : '.$e->getMessage());
   }
   
?>