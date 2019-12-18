<?php
    require_once '../../model/modelClient.php';
    require_once '../../model/modelCompte.php';
    $numC = genererNumero();
    $numCli = genererNumeroCl();
    include '../../header.php';
    ?>

<br>
<h1 class="display-4" align="center" >NOUVEAU COMPTE</h1>
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

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<p class="divider-text">
        <span class="bg-light">CLIENT</span>
    </p>
	<form method="POST" action="/mesprojets/BanqueDuPeuple/compteC">
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input name="numeroCli" class="form-control" value="<?= $numCli ?>" type="text" readonly>
    </div>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom" class="form-control" placeholder="Nom" type="text" required>
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="prenom" class="form-control" placeholder="Prenom" type="text" required>
    </div>
    <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		 </div>
        <input name="adresse" class="form-control" placeholder="Adresse" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="ind" class="custom-select" style="max-width: 120px;">
		    <option selected="">+221</option>
            <?php
                for ($i=223; $i <= 239; $i+=2) { 
                    ?>
                    <option><?= $i ?></option>
                    <?php
                    if ($i == 227) {
                        echo "<option>$i</option>";
                    }
                }
            ?>
		</select>
    	<input name="tel" class="form-control" value="770000000" max="789999999" placeholder="Phone number" type="number" required>
    </div>
    <p class="divider-text">
        <span class="bg-light">COMPTE</span>
    </p> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input name="numero" class="form-control" placeholder="Numero" value="<?= $numC ?>" type="text" readonly>
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-dollar"></i> </span>
		</div>
        <input name="solde" class="form-control" placeholder="Solde" type="number" min="500" required>
    </div> <!-- form-group// -->
     <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" name="ajoutCompte" class="btn btn-success btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
   
</form>
</article>
</div> <!-- card.// -->




</div> 
<!--container end.//-->

    
<?php
    include '../../footer.php';