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
    // on check si le submit a été enclenché    
if (isset($_POST['submit']))
{
        $extension = 'png';
        $taille = 150;
        $ip = $_SERVER['REMOTE_ADDR'];
        $message = $_POST['texte'];
        $img = $_FILES['photo'];


    
        
    // on vérifie que le message et le fichier ont été entrés
    if ($message && (!empty ($_FILES)))
    {        
        
            $nom = time() . $img['name'];
// on verifie si l extensio du fichier correspond a une image -> ne fonctionne pas pour aucune raison valable

            // $ext = array('.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF');
            // $extension = strrchr($img,'.');

            //     if (in_array($extension, $ext)) 
            //         {
            //             echo "Vous devez uploader un fichier de type png, jpg, jpeg ou gif";
            //         }
                    move_uploaded_file($img['tmp_name'], "img_photo/".$nom);


        $sql = "INSERT INTO pictures (nom,extension,taille,ip,date_envoie,message) VALUES (:nom,:extension,:taille,:ip,NOW(),:message)";
        $q = $connexion->prepare($sql);
            
        $q->bindValue('nom', $nom);
        $q->bindValue('extension', $extension);
        $q->bindValue('taille', $taille);
        $q->bindValue('ip', $ip);
        $q->bindValue('message', $message);
        var_dump($q->execute());

       

        } else echo "Vous avez oublié votre image ou votre texte";



}
    ?>


    <body>

    	<h1>Mon futur titre</h1>
     	<form id ="picture" method="post" action="index.php" enctype="multipart/form-data" accept="image/*">
                

            	<div class="input-file-container">  
            		<input class="input-file" id="my-file" type="file" name="photo" required accept="image/*">
            		<label tabindex="0" for="my-file" class="input-file-trigger">choisissez votre photo!!</label>
            	</div>

            	<div class="group"> 
            		<input type="text" name="texte" maxlength="16" placeholder="Votre texte" required>
            	</div>
                   

				<input type="submit" name="submit" value="Envoi" id="confirm">

				

        </form>
        <div class="container_pic">

            <?php
             // On récupère le contenu de ma table
        $reponse = $connexion->query('SELECT * FROM pictures');

            // On affiche les données tant qu'il y en a
        while ($donnees = $reponse->fetch())
{
?>
                    <div class="photo">
                        <img src="img_photo/<?php echo $donnees['nom']; ?>" alt="">
                        <p><?php echo $donnees ['message']?></p>
                    </div>
                    <?php
}

$reponse->closeCursor(); // fin de la requête

?>
                    
                </div>
        <script>

        </script>
        <?php
print_r($connexion->errorInfo());
?>
    </body>
</html>