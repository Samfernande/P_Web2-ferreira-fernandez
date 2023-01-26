
/*Quand l'utilisateur clique sur le bouton, cache ou montre les éléments de la liste déroulante */
function myFunction() {

  document.getElementById("myDropdown").classList.toggle("show");

}

// Ferme la liste déroulante si l'utilisateur clic hors du bouton
window.onclick = function(event) {

    // Si le clique est hors du bouton

  if (!event.target.matches('.dropbtn')) 
  {

    // Récupère le contenu du bouton
    var dropdowns = document.getElementsByClassName("dropdown-content");

    // Si l'élément du contenu du bouton contien "show", lui retire l'attribut. (Puis le cache)
    for (i = 0; i < dropdowns.length; i++) 
    {

      if (dropdowns[i].classList.contains('show')) 
      {
        dropdowns[i].classList.remove('show');
      }

    }
  }
}