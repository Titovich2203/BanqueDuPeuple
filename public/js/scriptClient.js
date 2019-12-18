$(document).ready(function() {
    var numCompte = "";
    $('.addCompte').click(function(event) {
        var btnClick = $(event.target).closest('button');
        var idClient = btnClick.attr('idCl');
        $.ajax({
            url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
            type: 'GET',
            data: { getNumC: 0 },
            success: function(data) {
                if (data != 0) {
                    $('#numero').attr('value', data);
                    numCompte = data;
                }

            }
        })
        $('#idCli').attr('value', idClient);
        // $('#saveCompte').click(function() {
        //         let solde = document.getElementById("solde");
        //         console.log(solde.value);
        //         if (solde.value < 500 || solde.value === null) {
        //             alert("LE SOLDE DOIT ETRE SUPERIEUR A 500 !!");
        //         } else {
        //             $.ajax({
        //                 url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
        //                 type: 'GET',
        //                 data: { numero: numCompte, sold: solde, idCl: idClient },
        //                 success: function(data) {
        //                     if (data > 0) {
        //                         alert("COMPTE AJOUTE AVEC SUCCES !!");
        //                     } else {
        //                         alert("ECHEC D'AJOUT");
        //                     }
        //                 }
        //             })
        //         }
        //     })
        /*$("#passerId").text(btnClick.attr('idCl'));
        console.log($("#passerId"));*/
    })
    $('.listCompte').click(function(event) {
        var btnClick = $(event.target).closest('button');
        var idClient = btnClick.attr('idCl');
        $('#listCompteDuClient').load('/mesprojets/BanqueDuPeuple/public/ajax/listCompte.php?idCl=' + idClient)
    })
    $('.supprimerCl').click(function(event) {
        var btnClick = $(event.target).closest('button');
        var id = $(btnClick).attr('idCl');
        var tr = $(btnClick).closest('tr');
        tr.css('background-color', 'rgba(255, 0, 0, 0.3)')
        setTimeout(function() {
            var rep = confirm("VOULEZ VOUS REELLEMENT CE CLIENT ?? ");
            if (rep) {
                $.ajax({
                    url: '/mesprojets/BanqueDuPeuple/public/ajax/clientController.php',
                    type: 'GET',
                    data: { del: id },
                    success: function(data) {
                        if (data != 0) {
                            tr.fadeOut(1600, function() {});
                        }

                    }
                })
            } else {
                tr.css('background-color', 'rgba(0, 0, 0, 0.3)')
            }
        }, 500);
    })
})