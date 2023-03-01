jSuites.rating(document.getElementById('starRating'), {
  number: 5,
  tooltip: [ 1, 2, 3, 4, 5],
})

const divs = document.querySelectorAll('[data-index]');
divs.forEach((div) => {
div.addEventListener('click', () => {
  const rating = div.getAttribute('data-index');
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('rating=' + rating);
});
});