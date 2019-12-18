<?php
    require_once '../../src/model/modelCompte.php';
    $comptes = getComptesByIdClient($_GET['idCl']);
    
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
      <?php } ?>

      
<script src="public/js/scriptCompte.js"></script>