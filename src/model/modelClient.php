<?php 
	require_once 'bd.php';
	function insererClient($numeroCli, $nom, $prenom, $adresse,  $tel)
    {
        $lastId = lastInsertIdForTable("client");

        $insert = 'INSERT INTO client VALUES ("'.$lastId.'","'.$numeroCli.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$tel.'" )';
        global $bd;
        $bd -> exec($insert);
        return $bd -> lastInsertId();
    }
	function modifierClient($numeroCli, $nom, $prenom, $adresse,  $tel)
    {
        $sql = 'UPDATE client SET nom = "'.$nom.'",prenom = "'.$prenom.'",adresse = "'.$adresse.'",tel = "'.$tel.'" WHERE numero = "'.$numeroCli.'" ';
        global $bd;
        return $bd -> exec($sql);
    }
	function getClientByIdCompte($idCompte)
	{
		$sql = "SELECT Cl.* FROM client Cl, Compte Cp WHERE Cp.idCLIENT = Cl.id AND Cp.id = '$idCompte' ";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function getAllClients()
	{
		$sql = "SELECT * FROM client ORDER BY id DESC";
		global $bd;
		return $bd -> query($sql) -> fetchall();
	}
	function getClientByNum($numero)
	{
		$sql = "SELECT * FROM client WHERE numero='$numero' ";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
	function getClientById($id)
	{
		$sql = "SELECT * FROM client WHERE id='$id' ";
		global $bd;
		return $bd -> query($sql) -> fetch();
	}
    function genererNumeroCl(){
        $id = lastInsertIdForTable("client");
        $numero = "BDP_".gmdate('d').gmdate('m').gmdate('Y')."_CL".$id;
        return $numero;
	}
	function deleteClient($idCli){
		$sql = "DELETE FROM client WHERE id = $idCli ";
		global $bd;
		return $bd -> exec($sql);
	}
 ?>