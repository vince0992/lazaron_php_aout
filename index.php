<?php 
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP upload picture</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
        <?php include("config.php"); ?>

    <?php
        // $nom = 'ma super photo';
        // $extension = '.png';
        // $taille = '.png';
        // $ip = '.png';
        // $date_envoie = '.png';
        // $message = '.png';
if (isset($_POST['submit']))
{
        // $stmt = $connexion->query("INSERT INTO pictures VALUES ('', 'chien', 'chien', 'chien', 'chien', 'chien', 'chien')");
        // $sth = $connexion->prepare("INSERT INTO pictures VALUES (:id, :nom, :extension, :taille, :ip, :date_envoie, :message)");
        
        // $stmt->bindValue('id', $id);
        // $stmt->bindValue('nom', $nom);
        // $stmt->bindValue('extension', $extension);
        // $stmt->bindValue('taille', $taille);
        // $stmt->bindValue('ip', $ip);
        // $stmt->bindValue('date_envoie', $date_envoie);
        // $stmt->bindValue('message', $message);

        // insertion d'une ligne
        // $id = '';
        // $nom = 'ma super photo';
        // $extension = '.png';
        // $taille = '.png';
        // $ip = '.png';
        // $date_envoie = '.png';
        // $message = '.png';
        // $stmt->execute();

        /* Exécute une requête préparée en associant des variables PHP */
$id = '3';
$nom = 'rouge';
$extension = 'png';
$taille = 150;
$ip = '100';
$date_envoie = '2015-08-25 04:16:32';
$message = 'coucou';

$sth = $connexion->prepare('INSERT INTO pictures VALUES :id, :nom, :extension, :taille, :ip, :date_envoie, :message');
    
$sth->bindValue('id', $id);
$sth->bindValue('nom', $nom);
$sth->bindValue('extension', $extension);
$sth->bindValue('taille', $taille);
$sth->bindValue('ip', $ip);
$sth->bindValue('date_envoie', $date_envoie);
$sth->bindValue('message', $message);
var_dump($sth->execute());
} else echo "problem";
    ?>
    <body>

    	<h1>Mon futur titre</h1>
     	<form id ="picture" method="post" action="index.php" enctype="multipart/form-data" accept="image/*">
                

            	<div class="input-file-container">  
            		<input class="input-file" id="my-file" type="file" name="photo_cover" required accept="image/*">
            		<label tabindex="0" for="my-file" class="input-file-trigger">choisissez votre photo</label>
            	</div>

            	<div class="group"> 
            		<input type="text" name="texte"placeholder="Votre texte" required>
            	</div>
                   

				<input type="submit" name="submit" value="Envoi" id="confirm">

				

        </form>
        <div class="container_pic">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                    <img src="" alt="">
                </div>
        <script>

        </script>
        <?php
print_r($connexion->errorInfo());
?>
    </body>
</html>