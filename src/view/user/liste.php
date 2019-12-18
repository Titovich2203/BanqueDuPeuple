<?php

    require_once '../../model/modelUser.php';
    //$comptes = getAllCompteAvecClients();
    $users = getUsers();
    include '../../header.php';
    ?>
<br>
<h1 class="display-4" style="margin-left:15px">LISTE DES UTILISATEURS</h1>

<div class="content" id="ajax-content">
    <table class="table table-striped table-responsive-md btn-table">

    <thead>
    <tr>
        <th>#</th>
        <th>NUM</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>LOGIN</th>
        <th>PROFIL</th>
        <th>ACTIONS</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $i = 0;
      foreach ($users as $key => $c) { 
        if($c['profil'] != "superadmin"){
        $i++;
        ?>
        <tr>
        <th scope="row"><?= $i ?></th>
        <td>@NUM<?= $i ?></td>
        <td><?= $c['nom'] ?></td>
        <td><?= $c['prenom'] ?></td>
        <td><?= $c['login'] ?></td>
        <td><?= $c['profil'] ?></td>
        <td>
        <button class="btn btn-danger"> SUPPRIMER </button>
        <button class="btn btn-primary"> MODIFIER </button>
        </td>
    </tr>
      <?php }
      }
    ?>
    </tbody>

    </table>
    <br><br>
</div>

<?php
    include '../../footer.php';