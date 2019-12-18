let mdps = document.getElementsByTagName('input');
if (mdps !== null) {
    for (let i = 0; i < mdps.length; i++) {
        if (mdps[i].attributes['type'].value === "password") {

            mdps[i].onkeypress, mdps[i].onkeydown, mdps[i].onkeyup = function() {
                if (mdps[i].value.length === 0) {
                    mdps[i].style.backgroundColor = "white";
                } else {
                    if (mdps[i].value.length <= 4) {
                        mdps[i].style.backgroundColor = "red";
                    } else {
                        if (mdps[i].value.length < 8) {
                            mdps[i].style.backgroundColor = "orange";
                        } else {
                            mdps[i].style.backgroundColor = "green";
                        }
                    }
                }
            }
        }
        if (mdps[i].attributes['type'].value !== "submit" && mdps[i].attributes['type'].value !== "checkbox") {
            mdps[i].setAttribute("required", "");
        }
    }
}

var btnChange = document.getElementsByName('changeMdp')[0];
var mdp1 = document.getElementById('motDePasse1');
var mdp2 = document.getElementById('motDePasse2');
if (mdp1 !== null && mdp2 !== null && btnChange !== null) {
    mdp2.onkeyup = function() {
        console.log(mdp1.value);
        if (mdp2.value.length >= mdp1.value.length) {
            if (mdp1.value === mdp2.value) {
                btnChange.removeAttribute('disabled');
            } else {
                mdp2.value = "";
                alert("VEUILLEZ SAISIR LE MEME MOT DE PASSE!");
            }
        }
    }
    mdp2.onkeypress = function() {
        console.log(mdp1.value);
        if (mdp2.value.length >= mdp1.value.length) {
            if (mdp1.value === mdp2.value) {
                btnChange.removeAttribute('disabled');
            } else {
                mdp2.value = "";
                alert("VEUILLEZ SAISIR LE MEME MOT DE PASSE!");
            }
        }
    }
    mdp2.onkeydown = function() {
        console.log(mdp1.value);
        if (mdp2.value.length >= mdp1.value.length) {
            if (mdp1.value === mdp2.value) {
                btn.removeAttribute('disabled');
            } else {
                mdp2.value = "";
                alert("VEUILLEZ SAISIR LE MEME MOT DE PASSE!");
            }
        }
    }

}

var newOp = document.getElementById("newOp");
var divNumCompte = document.getElementById("divNumeroCompte");
if (newOp !== null) {
    newOp.onclick = function() {
        divNumCompte.removeAttribute('hidden');
        newOp.setAttribute('hidden', 'hidden');
    }
}

var typeOp = document.getElementById("typeOperation");
var pop_up = document.getElementById("conditionPret");
console.log(typeOp);
if (typeOp !== null) {
    typeOp.onblur, typeOp.onchange = function() {
        console.log(typeOp.value);
        if (typeOp.value === "emprunt") {
            pop_up.removeAttribute("hidden");
        }
    }
}

var accepter = document.getElementById("accepterCondition");
if (accepter !== null) {
    accepter.onclick = function() {
        pop_up.setAttribute("hidden", "hidden");
    }
}