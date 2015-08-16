<!doctype html>
<html>
     <?php include("include_header.php"); ?>
        <?php include("config.php"); ?>
    <body>
        <div class="rien"></div>

    	<?php
//si le formulaire de connexion a l admin est envoye
if (isset($_POST['submit_ad'])){
	//si la password est bon
	if (($_POST['password'])=="adminheaj")
	{
		//on stock le texte dans une variable
		$nvmessage = $_POST['texte_update'];

             // On récupère le contenu de la table
        $reponse = $connexion->query('SELECT * FROM pictures ORDER BY id DESC');
        //si le formulaire de mofification est envoyé
		if (isset($_POST['form_update'])){
			//on met a jour le message avec nvmessage, là ou l'id correspond
			$change = "UPDATE pictures SET message = :nvmessage WHERE id = :id_bdd";
			$z = $connexion->prepare($change);

			$z->bindValue('nvmessage', $nvmessage);
			$z->bindValue('id_bdd', $id_bdd);
			$z->execute();
}
		// si le formulaire de suppression est envoyé
		if(isset($_POST['form_delete'])){
			//on supprimer la ligne avec l id correspondant
			$delete = $connexion->exec("DELETE FROM pictures WHERE id = '$id_bdd'");
		}
            // On affiche les données tant qu'il y en a
        while ($donnees = $reponse->fetch())
{
	$id_bdd = $donnees ['id'];
?>
                    <div class="photo">
                        <img class="pic" src="img_photo/<?php echo $donnees['nom']; ?>" alt="">
                        <p><?php echo $donnees ['message']?></p>
                        <!-- <p><?php //echo $id_bdd ?></p> -->

                        <!-- <form class="form2" method="post" action="update_exec.php">
                            <input name="recupere_ip" type="hidden" value="<?php //echo $donnees['ip'] ?>">
                             <input class="bouton" type="submit" name="update_ip" value="Voir toutes les photos de cette personne">
                        </form> -->
                    </div>

                    <form method="post" class="form_update" action="">
                    	<input type="text" name="texte_update">
                    	<input type="submit" name="submit_update" value="modifier">
                    </form>
                    <form method="post" class="form_delete" action="">
                    	<input type="submit" name="submit_delete" value="supprimer">
                    </form>



                    <?php
}

$reponse->closeCursor(); // fin de la requête


	}
}

    	?>
        <form id="form_ad" method="post">
        	<label for="password">Password administrateur</label>

        	<input type="password" name="password">
        	<input type="submit" name="submit_ad" value="connexion">
        </form>
        <script src="js/main.js"></script>
    </body>
</html>