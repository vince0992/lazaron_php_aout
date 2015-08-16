<!doctype html>
<html>
    	<?php include("include_header.php"); ?>
        
        <?php include("config.php"); ?>
        <div class="rien"></div>

        <div class="container_pic">
            <a class="input-file-trigger2" href="javascript:history.back()">retour</a>
<?php
if(isset($_POST['update_ip'])){
    // On récupère l ip
    $code = $_POST['recupere_ip'];
    // requete pour selectionner les images du meme ip
        $reponse = $connexion->query("SELECT * FROM pictures WHERE ip = '$code' ORDER BY id DESC");

        // On affiche les données tant qu'il y en a
        while ($donnees = $reponse->fetch()){
        	?>
            <body>
					<div class="photo">
                        <img class="pic" src="img_photo/<?php echo $donnees['nom']; ?>" alt="">
                        <p><?php echo $donnees ['message']?></p>
                    </div>
        	<?php


        }//fin fetch
        $reponse->closeCursor(); // fin de la requête
    }//fin isset
   
?>
</div>
            <script src="js/main.js" type="text/javascript"></script>
</body>
</html>
    