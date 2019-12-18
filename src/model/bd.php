<?php
    $host = "localhost";
    $dbname = "banque";
    $user = "root";
    $mdp = "";
        try
        {
            $bd = new PDO('mysql:host='.$host.';dbname='.$dbname, $user,$mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            //echo 'CONNEXION REUSSIE!!!!';
        }
        catch (PDOException $e)
        {
            die('Erreur de connexion a la base de donnees ..! Veuillez contacter l\'administrateur :)...');
        }
        
    function lastInsertIdForTable($nom)
    {
        $sql = "SELECT max(id) FROM $nom";
        global $bd;
        $array =  $bd -> query($sql) -> fetch();
        if($array == NULL){
            $id = 1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        return $id;
    }