<?php
    require_once 'bd.php';

    function verifierConnexion($login, $mdp)
    {
        $sql = "SELECT * FROM utilisateur WHERE login='$login' ";
        global $bd;
        $user = $bd -> query($sql) -> fetch();
        if($user == null)
        {
            return null;
        }
        else
        {
            if(password_verify($mdp, $user['password'])){
                return $user;
            }
            else
            {
                return null;
            }
        }
        // fetch permet de retourner un seul resultat
    }
    function insererUser($nom, $prenom, $login, $mdp, $profil)
    {
    	$id = lastInsertIdForTable('utilisateur');
    	$sql = "INSERT INTO utilisateur VALUES('$id', '$nom', '$prenom', '$login', '$mdp', '$profil', 0)";
    	global $bd;
    	return $bd -> exec($sql);
    }
    function getPasswordById($id)
    {
        $sql = "SELECT password FROM utilisateur WHERE id = '$id' ";
        global $bd;
        return $bd -> query($sql) ->fetch();
    }
    function chamgeMdpById($id, $mdp)
    {
        $sql = "UPDATE utilisateur set password='$mdp', AlreadyLogIn=1 WHERE id='$id' ";
        global $bd;
        return $bd -> exec($sql);
    }
    function getUserById($id)
    {
        $sql = "SELECT * FROM utilisateur WHERE id = '$id' ";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    function getUsers()
    {
        $sql = "SELECT * FROM utilisateur ";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
?>