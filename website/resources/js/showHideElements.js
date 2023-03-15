function showCifs() {
    var bouton = document.getElementById("showDiv");
    
    // Récupérer toutes les divs de la page
    let divs = document.getElementsByClassName("allCifs");

    console.log(divs);
    
    // Parcourir les divs et changer leur propriété display
    for (var i = 0; i < divs.length; i++) {
        if (divs[i].style.display == "none") {
        // Si la div est cachée, l'afficher
        divs[i].style.display = "block";
        
        // Changer le texte du bouton
        bouton.innerHTML = "Cacher les CIFs de l'utilisateur";
        } else {
        // Si la div est affichée, la cacher
        divs[i].style.display = "none";
        
        // Changer le texte du bouton
        bouton.innerHTML = "Afficher les CIFs de l'utilisateur";
        }
        
    }
}