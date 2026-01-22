document.addEventListener('DOMContentLoaded', () => {
    // Sélectionne tous les éléments avec la classe "cave figure"
    const figures = document.querySelectorAll('.cave figure');

    // Ajoute un gestionnaire d'événements à chaque figure
    figures.forEach((figure, index) => {
        figure.addEventListener('click', () => {
            // Sélectionne la popup associée à la figure cliquée
            const popup = document.querySelectorAll('.cave .popup')[index];

            // Toggle la classe "hidden" sur la popup
            popup.classList.remove('hidden');
        });
    });

    document.querySelectorAll('.popup i').forEach((croix, index) => {
        croix.addEventListener('click',()=>{
            document.querySelectorAll('.cave .popup')[index].classList.add('hidden')
        })

    })
});

