    	<?php 
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
?>
<!doctype html>
<html>
    	<?php include("include_header.php"); ?>
        
        <?php include("config.php"); ?>
        <div class="rien"></div>

        <div class="container_pic">
            <a class="input-file-trigger2" href="javascript:history.back()">retour</a>


<?php

if(isset($_POST['update_ip'])){
        //and then execute a sql query here
        // On récupère le contenu de ma table
        
       // $code=$_POST['recupere_ip'];
    $code = $_POST['recupere_ip'];
        

        $reponse = $connexion->query("SELECT * FROM pictures WHERE ip = '$code'");
        // $ip_posteur = $donnees['message'];
        


            // On affiche les données tant qu'il y en a
        while ($donnees = $reponse->fetch()){
        // $code=$donnees['ip'];

        	?>
            <body>

					<div class="photo">
                        <img class="pic" src="img_photo/<?php echo $donnees['nom']; ?>" alt="">
                        <p><?php echo $donnees ['message']?></p>
                    </div>



                    <!-- <p>ip de l'utilisateur est <?php //echo $donnees['ip'];?></p> -->


        	<?php

        // $code=$donnees['ip'];
        // echo $code;

        }//fin fetch
        $reponse->closeCursor(); // fin de la requête
    }//fin isset
    else {
    echo" dhur";
    }
?>
</div>
            <script src="js/main.js" type="text/javascript"></script>
</body>
</html>
    <?php
// print_r($connexion->errorInfo());
?>