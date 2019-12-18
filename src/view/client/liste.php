<?php
    require_once '../../model/modelClient.php';
    $clients = getAllClients();
    include '../../header.php';
    ?>
<br>
<?php
  if (isset($_GET['ok'])) {
    echo $_GET['ok'];
    if($_GET['ok'] == '1'){
    ?>
    <h1 class="display-6" align="center" style="color: green" >COMPTE CREE AVEC SUCCES</h1>
    <?php
    }
    else{
        ?>
    <h1 class="display-6" align="center" style="color: red" >ECHEC DE CREATION</h1>
        <?php
    }
}
?>
<h1 class="display-4">LISTE DES CLIENTS</h1>
<br>
<div class="content" id="ajax-content">
    <table class="table table-striped table-responsive-md btn-table">

    <thead>
    <tr>
        <th>#</th>
        <th>NUMERO</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>ADRESSE</th>
        <th>TEL</th>
        <th>ACTIONS</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $i = 0;
      foreach ($clients as $key => $cl) { 
        $i++;
        ?>
        <tr>
        <th scope="row"><?= $i ?></th>
        <td><?= $cl['numero'] ?></td>
        <td><?= $cl['nom'] ?></td>
        <td><?= $cl['prenom'] ?></td>
        <td><?= $cl['adresse'] ?></td>
        <td><?= $cl['tel'] ?></td>
        <td><button type="button" class="btn btn-outline-success addCompte" idCl="<?= $cl['id'] ?>" data-toggle="modal" data-target="#basicExampleModal">AJOUTER NOUVEAU COMPTE</button> <button type="button" class="btn btn-outline-primary listCompte" data-toggle="modal" data-target="#centralModalSm" idCl="<?= $cl['id'] ?>">LISTE DES COMPTES</button> <button type="button" class="btn btn-outline-danger supprimerCl" idCl="<?= $cl['id'] ?>">SUPPRIMER</button></td>
    </tr>
      <?php }
    ?>
    
    </tbody>

    </table>
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NOUVEAU COMPTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="divider-text">
        <span class="bg-light">COMPTE</span>
    </p> 
    <form method="POST" action="/mesprojets/BanqueDuPeuple/compteC">
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input name="numero" id="numero" class="form-control" placeholder="Numero" type="text" readonly>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="solde" id="solde"  class="form-control" placeholder="Solde" type="number"min="500" required>
        <input id="idCli" name="idCli" type="text" hidden>
    </div> <!-- form-group// -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="ajoutCptCl" type="submit" id="saveCompte" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-xl" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">LISTE DES COMPTES</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

        <tbody id="listCompteDuClient">
        </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->


</div>
<?php
    include '../../footer.php';