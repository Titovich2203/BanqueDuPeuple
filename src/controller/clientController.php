<?php
	require_once '../model/modelCompte.php';
    require_once '../model/modelClient.php';
    if(isset($_POST['modifierCl'])){
        var_dump($_POST);
        extract($_POST);
		$tel = $ind.$tel;
        $idCli = modifierClient($numeroCli, $nom, $prenom, $adresse,  $tel);
        if($idCli > 0)
        header('location:/mesprojets/BanqueDuPeuple/updateS');
        else
        header('location:/mesprojets/BanqueDuPeuple/updateE');
    }