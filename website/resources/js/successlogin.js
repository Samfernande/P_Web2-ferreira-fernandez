// Récupération de l'élément HTML pour la popup
const popup = document.getElementById('popup');
        
// Affichage de la popup en cas de connexion réussie
function showPopup() {
  popup.classList.add('show');
  
  // Disparition de la popup après 5 secondes
  setTimeout(function() {
    popup.classList.remove('show');
  }, 2000);
}

// Appel de la fonction showPopup() lors de la réussite de la connexion
// Ici, on simule la réussite de la connexion après 3 secondes
setTimeout(function() {
  showPopup();
}, 30);