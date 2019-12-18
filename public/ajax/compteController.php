<?php
session_start();
    require_once '../../src/model/modelCompte.php';
    if (isset($_GET['id'])) {
        $res =  changeEtat($_GET['id']);
        echo $res;
    }
    if(isset($_GET['getNumC'])){
        $num = genererNumero();
        echo $num;
    }
    if(isset($_GET['del'])){
        $res = deleteCompte($_GET['del']);
        echo $res;
    }
    if(isset($_GET['numero'])){
        $res = findCompteByNumero($_GET['numero']);
        if($res != null)
        {
            echo '1';
        }
        else{
            echo '0';
        }
    }
    // if(isset($_GET['numero'])){
    //     extract($_GET);
	// 	$dateCreation = gmdate("d-m-Y");
	// 	$idGestCompte = $_SESSION['idUser'];
    //     $idCompte = ajoutCompte($numero, $dateCreation, $sold, $idCl, $idGestCompte);
    //     echo $idCompte;
    // }