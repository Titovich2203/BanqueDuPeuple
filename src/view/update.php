<?php
    include '../header.php';
    ?>

<br>
<h1 class="display-4" align="center" >MISE A JOUR COMPTE OU CLIENT</h1>
<?php
    if (isset($_GET['ok'])) {
        echo $_GET['ok'];
        if($_GET['ok'] == '1'){
        ?>
        <h1 class="display-6" align="center" style="color: green" >MODIFICATION REUSSIE AVEC SUCCES</h1>
        <?php
        }
        else{
            ?>
        <h1 class="display-6" align="center" style="color: red" >ECHEC DE MODIFICATION</h1>
            <?php
        }
    }
?>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
<button id="updateCl" class="btn btn-primary btn-block" style="width: 360px">MODIFIER CLIENT</button><br>
    <div id="formulaireUpdateCl">
	<p class="divider-text">
        <span class="bg-light">CLIENT</span>
    </p>
	<form method="POST" action="/mesprojets/BanqueDuPeuple/clientC">
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		 </div>
        <input id="numClient" name="numeroCli" class="form-control" placeholder="NUMERO CLIENT" type="text">
    </div>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input id="nomClient" name="nom" class="form-control" placeholder="Nom" type="text" required>
    </div> 
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input id="prenomClient" name="prenom" class="form-control" placeholder="Prenom" type="text" required>
    </div>
    <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		 </div>
        <input id="adrClient" name="adresse" class="form-control" placeholder="Adresse" type="text" required>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select id="ind" name="ind" class="custom-select" style="max-width: 120px;">
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
    	<input id="telClient" name="tel" class="form-control" value="770000000" max="789999999" placeholder="Phone number" type="number" required>
    </div>
    <button id="btnUpCl" type="submit" name="modifierCl" class="btn btn-success btn-block"> VALIDER  </button>
    </form>
    </div>
    <br>
    <button id="updateCompte" class="btn btn-primary btn-block" style="width: 360px">MODIFIER COMPTE</button><br>
    <div id="formulaireUpdateCp">
        <p class="divider-text">
            <span class="bg-light">COMPTE</span>
        </p> 
	<form method="POST" action="/mesprojets/BanqueDuPeuple/compteC">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="numCompte" name="numero" class="form-control" placeholder="Numero" type="text">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="solde" name="solde" class="form-control" placeholder="Solde" type="number" min="500" required>
        </div> <!-- form-group// -->
        <!-- form-group// -->                                      
        <div class="form-group">
            <button type="submit" id="updateCp" name="updateCompte" class="btn btn-success btn-block"> Valider </button>
        </div> <!-- form-group// -->  
        </form>
    </div>    

</article>
</div> <!-- card.// -->




</div> 
<!--container end.//-->

<?php
    include '../footer.php';