<?php
	session_start();
	require_once '../model/modelCompte.php';
	require_once '../model/modelClient.php';

	if (isset($_POST['ajoutCptCl'])) {
		var_dump($_POST);
		extract($_POST);
		$dateCreation = gmdate("d-m-Y");
		$idGestCompte = $_SESSION['idUser'];
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
		if ($idCompte > 0) 
		{
			header('location:/mesprojets/BanqueDuPeuple/GestClientS');
		}
		else
		{
			header('location:/mesprojets/BanqueDuPeuple/GestClientE');
		}
	}
	if(isset($_POST['updateCompte'])){
		extract($_POST);
		if(updateCompte($numero, $solde) > 0)
		header('location:/mesprojets/BanqueDuPeuple/updateS');
		else
		header('location:/mesprojets/BanqueDuPeuple/updateE');
	}
	if(isset($_POST['ajoutCompte'])){
		extract($_POST);
		//var_dump($_POST);
		$dateCreation = gmdate("d-m-Y");
		$tel = $ind.$tel;
		$idCli = insererClient($numeroCli, $nom, $prenom, $adresse,  $tel);
		$idGestCompte = $_SESSION['idUser'];
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
		if ($idCompte > 0) 
		{
			header('location:/mesprojets/BanqueDuPeuple/newCompteS');
		}
		else
		{
			header('location:/mesprojets/BanqueDuPeuple/newCompteE');
		}
	}
	if (isset($_GET['num'])) {
		$compte = findCompteByNumero($_GET['num']);
		if($compte == null)
		{
            if(isset($_GET['p'])){
            	header('location:/mesprojets/BanqueDuPeuple/view/?view=compte&ok=0');
            }
            else
            {
            	header('location:/mesprojets/BanqueDuPeuple/view/?view=operation&ok=0');
            }
			
		}
		else
		{
			if(isset($_GET['p']))
			{
				header('location:/mesprojets/BanqueDuPeuple/view/?view=operation&ok=1&num='.$compte["numero"].'&p');
			}
			else
			{
				header('location:/mesprojets/BanqueDuPeuple/view/?view=operation&ok=1&num='.$compte["numero"].'');
			}
			
		}
	}
	if (isset($_GET['ajoutCC'])) {
		extract($_POST);
		$dateCreation = date("d-m-Y");
		$idCli = $btnAjout;
		$idGestCompte = $_SESSION['idUser'];
		$idCompte = ajoutCompte($numero, $dateCreation, $solde, $idCli, $idGestCompte);
		if ($idCompte > 0) {
			$idTypeOperation = getTypeOpByNom("depot")['id'];
			$numeroOp = genererNumeroOperation();
			if(depot($numeroOp, $dateCreation, $solde, $idCompte, $idTypeOperation, $idGestCompte) > 0)
			{
				if($_GET['ajoutCC'] == 1){
				header('location:/mesprojets/BanqueDuPeuple/view/?view=client&ok=1');
				}
				else
				{
					$client = getClientById($idCli);
					header('location:/mesprojets/BanqueDuPeuple/view/?view=rechClient&cni='.$client["cni"].'');
				}
			}else{
				if($_GET['ajoutCC'] == 1){
				header('location:/mesprojets/BanqueDuPeuple/view/?view=client&ok=0');
				}
				else
				{
					$client = getClientById($idCli);
					header('location:/mesprojets/BanqueDuPeuple/view/?view=rechClient&cni='.$client["cni"].'&ajoutCompte=0');
				}
			}
		}
	}
	if (isset($_GET['changeEtat'])) {
		$idCompte = $_GET['changeEtat'];
		echo "$idCompte";
		if (changeEtat($idCompte) > 0) {
			if (isset($_GET['pageCli'])) {
				header('location:/mesprojets/BanqueDuPeuple/view/?view=rechClient&cni='.$_GET['pageCli']);
			}
			else{
			header('location:/mesprojets/BanqueDuPeuple/view/?view=compte&ok=1');
		}
		}else{
			if (isset($_GET['pageCli'])) {
				header('location:/mesprojets/BanqueDuPeuple/view/?view=rechClient&cni='.$_GET['pageCli']);
			}
			else{
			header('location:/mesprojets/BanqueDuPeuple/view/?view=compte&ok=0');
		}
		} 	
	}
?>
