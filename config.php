<?php
try{
    $connexion = new PDO('mysql:host=localhost;dbname=php_aout;charset=utf8', 'root', 'root');
                        }
                        catch(PDOException $e){
                            echo $e->getMessage();
                        }
                        //'mysql:host=mysql51-107.perso;dbname=vincentld_db;charset=utf8', 'vincentld_db', 'RtAURjkjMdPU'
                        //'mysql:host=localhost;dbname=waytotrack;charset=utf8', 'root', 'root'

                        ?>