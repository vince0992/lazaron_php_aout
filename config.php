<?php
try{
    $connexion = new PDO('mysql:host=localhost;dbname=php_aout;charset=utf8', 'root', 'root');
                        }
                        catch(PDOException $e){
                            echo $e->getMessage();
                        }
                      

                        ?>
