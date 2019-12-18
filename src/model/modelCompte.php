<?php
    require_once 'bd.php';
    
    function ajoutCompte($numero, $dateCreation, $solde, $idClient, $idGestCompte)
    {
        //$idClient = insererClient();
        $lastId = lastInsertIdForTable("compte");
       $insert = "INSERT INTO compte VALUES ('$lastId','$numero','$dateCreation','$solde',$idClient,$idGestCompte, 1, 0, 0)";
        global $bd;
        $bd -> exec($insert);
        return $bd -> lastInsertId();
    }
    function updateCompte($numero, $solde)
    {
        $sql = "UPDATE compte SET solde = $solde WHERE numero = '$numero' ";
        global $bd;
        return $bd -> exec($sql);
    }
    function genererNumero(){
        $sql = "SELECT max(id) FROM compte";
        global $bd;
        $array =  $bd -> query($sql) -> fetch();
        if($array == NULL){
            $id = 1;
        }else{
            $array[0]++;
            $id = $array[0];
        }
        $numero = "BDP_".date('d').date('m').date('Y')."_C".$id;
        return $numero;
    }
    // Creer une methode findCompteByNumero($numero).
    function findCompteByNumero($numero){
        $sql = "SELECT * FROM compte WHERE numero='$numero'";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    // Creer une methode qui retourne la liste des comptes (getAllCompte).
    function getAllCompte(){
        $sql = "SELECT * FROM compte";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
    function getAllCompteAvecClients(){
        $sql = "SELECT Co.*,Cl.nom,Cl.prenom,Cl.adresse,Cl.tel, Cl.id as idCl FROM compte Co,client Cl WHERE Co.idClient = Cl.id ORDER BY Co.id DESC";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
    function changeEtat($idCompte){
        $sql = "SELECT etat FROM compte WHERE id='$idCompte'";
        global $bd;
        $etat = $bd -> query($sql) -> fetch();
        if ($etat[0] == '1') 
        {
            $sql = "UPDATE compte set etat = 0 WHERE id = '$idCompte'";
            return $bd -> exec($sql);
        }
        else
        {
            $sql = "UPDATE compte set etat = 1 WHERE id = '$idCompte'";
            return $bd -> exec($sql);
        }
    }
    function getNumCompteByIdOp($idOp)
    {
        $sql = "SELECT numero FROM compte WHERE id = (SELECT idCompte FROM operation WHERE id='$idOp')";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }

    function getCompteById($id)
    {
        $sql = "SELECT * FROM compte WHERE id = '$id'";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    function getComptesByIdClient($idCli)
    {
        $sql = "SELECT CP.*, CL.nom, CL.prenom FROM compte CP, client CL, utilisateur U WHERE CP.idClient = CL.id AND CP.idGestCompte = U.id AND CL.id = '$idCli' ";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
    function deleteComptesByIdClient($idCli)
    {
        $sql = "DELETE FROM compte WHERE idClient = $idCli";
        global $bd;
        return $bd -> exec($sql);
    }
    function deleteCompte($id)
    {
        $sql = "SELECT count(*) FROM compte WHERE idClient = (SELECT idClient FROM compte WHERE id = $id) ";
        global $bd;
        $nbr = $bd -> query($sql) -> fetch();
        if($nbr[0] == 1){
            return 0;
        }
        else{
            $sql = "DELETE FROM compte WHERE id = $id";
            $bd -> exec($sql);
            return 1;
        }
    }
?>