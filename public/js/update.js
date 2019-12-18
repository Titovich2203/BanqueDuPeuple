$('#formulaireUpdateCl').fadeOut(0, function() {});
$('#formulaireUpdateCp').fadeOut(0, function() {});
$('document').ready(function() {
    $('#updateCl').click(function(event) {
        $('#formulaireUpdateCl').fadeIn(1500, function() {});
        $('#nomClient').fadeOut(0, function() {});
        $('#prenomClient').fadeOut(0, function() {});
        $('#adrClient').fadeOut(0, function() {});
        $('#telClient').fadeOut(0, function() {});
        $('#ind').fadeOut(0, function() {});
        $('#btnUpCl').fadeOut(0, function() {});
        $('#numClient').keydown(function(event) {
            rechClient(document.getElementById('numClient').value);
        });
        $('#numClient').keyup(function(event) {
            rechClient(document.getElementById('numClient').value);
        });
        //$('#numClient').keyup(rechClient(event));
        function rechClient(num) {
            $.ajax({
                url: '/mesprojets/BanqueDuPeuple/public/ajax/clientController.php',
                type: 'GET',
                data: { numero: num },
                success: function(data) {
                    if (data == 1) {
                        //console.log($('#formulaireUpdateCl').children('input'));
                        $('#nomClient').fadeIn(1000, function() {});
                        $('#prenomClient').fadeIn(1000, function() {});
                        $('#adrClient').fadeIn(1000, function() {});
                        $('#telClient').fadeIn(1000, function() {});
                        $('#ind').fadeIn(1000, function() {});
                        $('#btnUpCl').fadeIn(1000, function() {});
                        $('#numClient').attr('readonly', '');
                    }
                }
            })
        }
    })
    $('#updateCompte').click(function(event) {
        $('#formulaireUpdateCp').fadeIn(1500, function() {});
        $('#solde').fadeOut(0, function() {});
        $('#numCompte').keydown(function(event) {
            rechCompte(document.getElementById('numCompte').value);
        });
        $('#numCompte').keyup(function(event) {
            rechCompte(document.getElementById('numCompte').value);
        });
        //$('#numClient').keyup(rechClient(event));
        function rechCompte(num) {
            $.ajax({
                url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
                type: 'GET',
                data: { numero: num },
                success: function(data) {
                    if (data == 1) {
                        //console.log($('#formulaireUpdateCl').children('input'));
                        $('#solde').fadeIn(1000, function() {});
                        $('#numCompte').attr('readonly', '');
                    }
                }
            })
        }
    })
})
