<?php
    session_start();
    require_once '../model/modelUser.php';
    if (isset($_POST['connexion']))
    {
        extract($_POST);
        $user = verifierConnexion($login, $mdp);
        if($user != null)
        {
            if($user['AlreadyLogIn'] == '1'){
                $_SESSION['profil'] = $user['profil'];
                $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
                $_SESSION['idUser'] = $user['id'];
                header('location:/mesprojets/BanqueDuPeuple/accueil');
            }
            else
            {
                $_SESSION['idUser'] = $user['id'];
                header('location:/mesprojets/BanqueDuPeuple/preAccueil');
            }
        }
        else
        {
            //insererUser("OK", "OK", "OK", password_hash("OK",PASSWORD_DEFAULT), "admin");
            header('location:/mesprojets/BanqueDuPeuple/errorConnexion');
            return;
        }

    }
    if (isset($_GET['deconnexion']))
    {
        session_unset();
        $_SESSION = array();
        header('location:/mesprojets/BanqueDuPeuple/');
    }
    if (isset($_POST['ajoutUser'])) {
        extract($_POST);
        if (strlen($mdp) < 8) {
            header('location:/mesprojets/BanqueDuPeuple/newUserC');
        }
        else
        {
            $profil = "admin";
            if(insererUser($nom, $prenom, $login, password_hash($mdp, PASSWORD_DEFAULT), $profil) > 0)
            {
                header('location:/mesprojets/BanqueDuPeuple/newUserS');
            }
            else
            {
                header('location:/mesprojets/BanqueDuPeuple/newUserE');
            }
        }
    }
    if (isset($_POST['changeMdp'])) {
        extract($_POST);
        $ancienMdp = getPasswordById($_SESSION['idUser']);
        if (strlen($mdp) >= 8) {
            if(password_verify($mdp,$ancienMdp['password']))
            {
                header('location:/mesprojets/BanqueDuPeuple/preAccueil');
            }
            else
            {
                if(chamgeMdpById($_SESSION['idUser'], password_hash($mdp, PASSWORD_DEFAULT)) > 0)
                {
                    $user = getUserById($_SESSION['idUser']);
                    $_SESSION['profil'] = $user['profil'];
                    $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
                    $_SESSION['idUser'] = $user['id'];
                    header('location:/mesprojets/BanqueDuPeuple/accueil');

                }
                else
                {
                    header('location:/mesprojets/BanqueDuPeuple/preAccueil');
                }
            }
        }
        else
        {
            header('location:/mesprojets/BanqueDuPeuple/preAccueil');
        }
    }
    
?>