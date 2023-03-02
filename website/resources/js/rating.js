
/*// Appel d'un JavaScript online pour générer les étoiles
jSuites.rating(document.getElementById('starRating'), {
  number: 5,
  tooltip: [1, 2, 3, 4, 5],
});

// Ajout d'un écouteur d'action qui après un clique, renvoie la valeur de l'étoile en POST
const divs = document.querySelectorAll('[data-index]');

//For pour toutes les DIV
divs.forEach((div) => {

  div.addEventListener('click', () => {

    const rating = div.getAttribute('data-index'); // Récupération des étoiles ayant l'attribut data-index
    const xhr = new XMLHttpRequest(); // Appel d'un objet HttpRequest

    xhr.open('POST', ''); // Méthode d'envoi
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Format de la réponse envoyée
    xhr.send('rating=' + rating); // Quelle valeur est renvoyée

    // Quand la requête http est chargée
    xhr.onload = function() 
    {

      if (xhr.status == 200) 
      {
        console.log("Texte" + xhr.response);
        //location.reload();
      } 
      else 
      {
        console.log("Erreur lors de l'envoi des données");
      }
    };
  });
});
*/

jSuites.rating(document.getElementById('starRating'), {
  number: 5,
  tooltip: [1, 2, 3, 4, 5],
});

// Ajout d'un écouteur d'action qui après un clique, renvoie la valeur de l'étoile en POST
const divs = document.querySelectorAll('[data-index]');

// Ajout d'un écouteur d'événement click sur chaque div
divs.forEach((div) => {
  div.addEventListener('click', () => {
    const value = div.getAttribute('data-index');
    const form = document.getElementById('ratingForm');
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'ratingInput';
    input.value = value;
    form.appendChild(input);
    form.submit();
    
  });
});
