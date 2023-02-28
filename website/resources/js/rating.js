const stars = document.querySelectorAll('.starRating input');

stars.forEach(star => {
  star.addEventListener('click', () => {
    const form = document.querySelector('form');
    form.submit();
  });
});
