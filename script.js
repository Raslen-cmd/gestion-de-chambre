function ajouter() {
    var nom = document.f1.nom.value;
    var prenom = document.f1.prenom.value;
    var cin = document.f1.cin.value;
    var adr = document.f1.adr.value;
    var arrive = document.f1.arrive.value;
    var depart = document.f1.depart.value;
    if (nom == '' || prenom == '' || cin == '' || adr == '' || arrive == '' || depart == '') {
        alert('Veuillez remplir tous les champs');
        return false;
    }
    if (cin.length != 8 || isNaN(cin)) {
        alert('Le champs CIN doit etre composé de 8 chiffres');
        return false;
    }
}


function consulter() {
    var cin = document.f.cin.value;
    if (cin == '') {
        alert('Le champs CIN est obligatoire')
        return false;
    }
    if (cin.length != 8 || isNaN(cin)) {
        alert('Le champs CIN doit etre composé de 8 chiffres');
        return false;
    }
}

function modifier() {
    var arrive = document.f.arrive.value;
    var depart = document.f.depart.value;
    if (arrive == '' || depart == '') {
        alert('Veuillez remplir tous les champs');
        return false;
    }

}