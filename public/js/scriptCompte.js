$(document).ready(function() {

    $('.bloquerAct').click(function(event) {
        var btnClick = $(event.target).closest('button');
        var idB = $(btnClick).attr('idB');
        var idA = $(btnClick).attr('idA');
        var tr = $(btnClick).closest('tr');
        var td = tr.children();
        if (idA) {
            btn2 = td.last().children().first();
            console.log(btn2);
            setTimeout(function() {
                var rep = confirm("VOULEZ VOUS REELEMENT ACTIVER CE COMPTE ?? ");
                if (rep) {
                    $.ajax({
                        url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
                        type: 'GET',
                        data: { id: idA },
                        success: function(data) {
                            if (data == 1) {
                                tr.css("backgroundColor", "rgba(0, 0, 0, 0.05)");
                                btnClick.attr('disabled', '');
                                btn2.removeAttr('disabled');
                            }
                        }
                    })
                } else {}
            }, 300);
            //alert("ACTIVER LE COMPTE");
        }
        if (idB) {
            var btn2 = td.last().children().last();
            console.log(btn2[0]);
            setTimeout(function() {
                var rep = confirm("VOULEZ VOUS REELEMENT BLOQUER CE COMPTE ?? ");
                if (rep) {
                    $.ajax({
                        url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
                        type: 'GET',
                        data: { id: idB },
                        success: function(data) {
                            if (data == 1) {
                                tr.css("backgroundColor", "rgba(255, 0, 0, 0.3)");
                                btnClick.attr('disabled', '');
                                btn2.removeAttr('disabled');
                            }
                        }
                    })
                } else {}
            }, 300);

            //alert("BLOQUER LE COMPTE");
        }
    })

    $('.delCompte').click(function(event) {
        var btnClick = $(event.target).closest('button');
        var id = $(btnClick).attr('idS');
        console.log(id);
        var tr = $(btnClick).closest('tr');
        tr.css('background-color', 'rgba(255, 0, 0, 0.3)')
        setTimeout(function() {
            var rep = confirm("VOULEZ VOUS REELLEMENT CE COMPTE ?? ");
            if (rep) {
                $.ajax({
                    url: '/mesprojets/BanqueDuPeuple/public/ajax/compteController.php',
                    type: 'GET',
                    data: { del: id },
                    success: function(data) {
                        if (data != 0) {
                            tr.fadeOut(1600, function() {});
                        } else {
                            alert("CE COMPTE EST LE SEUL DU CLIENT!!\n VEUILLEZ DONC ALLER SUPPRIMER LE CLIENT...");
                            tr.css('background-color', 'rgba(0, 0, 0, 0.3)');
                        }
                    }
                })
            } else {
                tr.css('background-color', 'rgba(0, 0, 0, 0.3)');
            }
        }, 500);
    })
})