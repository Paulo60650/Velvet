// Déclarations de mes différents regex
const alpha = /(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i;
const annee = /(^(19|20){1}[0-9]{2}$)/;
const prix = /(^[0-9]{1,10}\.[0-9]{2})/;

var errTitle = document.getElementById("errTitle");
var errArtist = document.getElementById("errArtist");
var errYear = document.getElementById("errYear");
var errGenre = document.getElementById("errGenre");
var errLabel = document.getElementById("errLabel");
var errPrice = document.getElementById("errPrice");
var errSelect = document.getElementById("errSelect");

// Declarartion de la fonctions de controle des valeurs rentre dans le champs title
function verifTitle(title) {
    if (title == "") {
        errTitle.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner le titre</h6>";
        event.preventDefault();
    } else if (!alpha.test(title)) {
        errTitle.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner un genre valide</h6>";
        event.preventDefault();
    } else {
        errTitle.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";

    }
};

// Declarartion de la fonctions de controle des valeurs rentre dans le champs Artist a contacter
function verifArtist(artist) {
    if (artist == "" || artist =="0") {
        errArtist.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner l'artiste</h6>";
        event.preventDefault();
    } else {
        errArtist.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";
    }
};

// Declarartion de la fonctions de controle des valeurs rentre dans le champs year
function verifYear(year) {
    if (year == "") {
        errYear.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner l'annee</h6>";
    } else if (!annee.test(year)) {
        errYear.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner une annee valide</h6>";
        event.preventDefault();
    } else {
        errYear.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";
    }
};

// Declarartion de la fonctions de controle des valeurs rentre dans le champs Code postal
function verifGenre(genre) {
    if (genre == "") {
        errGenre.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner un genre</h6>";
    } else if (!alpha.test(genre)) {
        errGenre.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner un genre valide</h6>";
        event.preventDefault();
    } else {
        errGenre.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";
    }
};

// Declarartion de la fonctions de controle des valeurs rentre dans le champs Label
function verifLabel(label) {
    if (label == "") {
        errLabel.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner le label</h6>";
    } else if (!alpha.test(label)) {
        errLabel.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner un label valide</h6>";
        event.preventDefault();
    } else {
        errLabel.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";
    }
};

// Declarartion de la fonctions de controle des valeurs rentre dans le champs Price
function verifPrice(price) {
    if (price == "") {
        errPrice.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner le prix</h6>";
        event.preventDefault();
    } else if (!prix.test(price)) {
        errPrice.innerHTML = "<h6 class=\"alert alert-danger\" role=\"alert\">Veuillez renseigner un prix valide</h6>";
        event.preventDefault();
    } else {
        errPrice.innerHTML = "<h6 class=\"alert alert-success\" role=\"alert\">Ok</h6>";
    }
};

// Recuperation de l'id du bouton modifier
var check = document.getElementById('envoie');
// Ajout de l'evenement click sur le bouton envoyer
check.addEventListener("click", function verif(event) {
    // Recuperation des valeurs rentre dans chaque champs du formulaire
    var title = document.getElementById("title").value;
    var artist = document.getElementById("artist").value;
    var year = document.getElementById("year").value;
    var genre = document.getElementById("genre").value;
    var label = document.getElementById("label").value;
    var price = document.getElementById("price").value;

    // Execution des fonctions de controle definit plus haut
    verifTitle(title);
    verifArtist(artist);
    verifYear(year);
    verifGenre(genre);
    verifLabel(label);
    verifPrice(price);
});
// Controle grace a l'event keyup et au fonction defini plus haut
var title = document.getElementById("title");
title.addEventListener("keyup", function keyTitle() {
    verifTitle(this.value);
});

var artist = document.getElementById("artist");
artist.addEventListener("change", function keyArtist() {
    verifArtist(this.value);
});

var genre = document.getElementById("genre");
genre.addEventListener("keyup", function keyGenre() {
    verifGenre(this.value);
});

var year = document.getElementById("year");
year.addEventListener("keyup", function keyYear() {
    verifYear(this.value);
});

var label = document.getElementById("label");
label.addEventListener("keyup", function keyLabel() {
    verifLabel(this.value);
});
var price = document.getElementById("price");
price.addEventListener("keyup", function keyPrice() {
    verifPrice(this.value);
});
