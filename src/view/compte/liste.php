<?php

    require_once '../../model/modelCompte.php';
    $comptes = getAllCompteAvecClients();
    //$comptes = array();
    include '../../header.php';
    ?>
<br>
<h1 class="display-4" style="margin-left:15px">LISTE DES COMPTES</h1>
<a href="/mesprojets/BanqueDuPeuple/newCompte"><button type="button" class="btn btn-outline-primary float-right newBtn" style="margin-top: -60px; margin-right: 15px">NOUVEAU COMPTE</button></a>
<br>
<div class="content" id="ajax-content">
    <table class="table table-striped table-responsive-md btn-table">

    <thead>
    <tr>
        <th>#</th>
        <th>NUMERO</th>
        <th>DATE CREATION</th>
        <th>SOLDE</th>
        <th>NOM CLIENT</th>
        <th>ACTIONS</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $i = 0;
      foreach ($comptes as $key => $c) { 
        $i++;
        ?>
        <tr <?php if ($c['etat'] == 0) {
          echo 'style="background-color: rgba(255, 0, 0, 0.3)"';
        }?>
        >
        <th scope="row"><?= $i ?></th>
        <td><?= $c['numero'] ?></td>
        <td><?= $c['dateCreation'] ?></td>
        <td><?= $c['solde'] ?></td>
        <td><?= $c['nom'] ?> <?= $c['prenom'] ?></td>
        <td>
        <button class="btn btn-outline-danger bloquerAct" idB="<?= $c['id'] ?>" <?php if($c['etat'] != '1') echo 'disabled=""' ?>>BLOQUER</button>
        <button class="btn btn-danger delCompte" idS="<?= $c['id'] ?>" > SUPPRIMER </button>
        <button class="btn btn-outline-success bloquerAct" idA="<?= $c['id'] ?>" <?php if($c['etat'] == '1') echo 'disabled=""' ?>> ACTIVER </button>
        </td>
    </tr>
      <?php }
    ?>
    </tbody>

    </table>
</div>

<?php
    include '../../footer.php';