<?php
    require_once '../../src/model/modelCompte.php';
    require_once '../../src/model/modelClient.php';
    if(isset($_GET['del'])){
        if(deleteComptesByIdClient($_GET['del']) > 0){
            $res = deleteClient($_GET['del']);
            echo $res;
        }
    }
    if(isset($_GET['numero'])){
        $res = getClientByNum($_GET['numero']);
        if($res != null)
        {
            echo '1';
        }
        else{
            echo '0';
        }
    }