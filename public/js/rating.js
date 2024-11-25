document.querySelectorAll('.rating').forEach(rating => {
    rating.addEventListener('mouseover', e => {
        if (e.target.classList.contains('star')) {
            const value = e.target.dataset.value;
            highlightStars(rating, value);
        }
    });

    rating.addEventListener('mouseout', () => {
        resetStars(rating);
    });

    rating.addEventListener('click', e => {
        if (e.target.classList.contains('star')) {
            const value = e.target.dataset.value;
            rating.setAttribute('data-selected', value);
            highlightStars(rating, value);
        }
    });
});

function highlightStars(rating, value) {
    rating.querySelectorAll('.star').forEach(star => {
        star.classList.toggle('text-warning', star.dataset.value <= value);
        star.classList.toggle('text-muted', star.dataset.value > value);
    });
}

function resetStars(rating) {
    const selectedValue = rating.getAttribute('data-selected');
    rating.querySelectorAll('.star').forEach(star => {
        star.classList.toggle('text-warning', star.dataset.value <= selectedValue);
        star.classList.toggle('text-muted', star.dataset.value > selectedValue);
    });
}
// -----------------------------------------------------------------
  document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.rating .star');
    const modalStars = document.querySelectorAll('.star-modal');

    let selectedRating = 0;

    stars.forEach(star => {
        star.addEventListener('click', (e) => {
            const rating = e.target.getAttribute('data-value');
            selectedRating = rating;

            // Mostrar las estrellas seleccionadas en el modal
            modalStars.forEach((modalStar, index) => {
                if (index < rating) {
                    modalStar.classList.add('text-warning');
                } else {
                    modalStar.classList.remove('text-warning');
                }
            });
            // Establecer los valores en el formulario
            document.getElementById('dish_id').value = e.target.parentElement.getAttribute('data-dish-id');
            document.getElementById('rating_value').value = selectedRating;

            // Mostrar el modal
            const ratingModal = new bootstrap.Modal(document.getElementById('ratingModal'));
            ratingModal.show();
        });
    });
});