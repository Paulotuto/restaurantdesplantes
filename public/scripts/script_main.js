document.addEventListener('DOMContentLoaded', () => {
    const caroussel = document.querySelector('.caroussel');
    const scrollAmount = 370.5;

    document.addEventListener("click", function(event) {
        var elementClique = event.target;

        // Vérifier si l'élément cliqué n'est pas celui que vous souhaitez exclure
        if (elementClique.classList.value !== "caroussel__item-popup-h3") {
            // Mettez ici le code à exécuter lorsque tout le corps est cliqué, sauf l'élément exclu
            if(elementClique.classList.value !== "caroussel__item-popup-img"){

                if(elementClique.classList.value !== "caroussel__item-popup-button"){
                
                    if(elementClique.classList.value !== "caroussel__item-popup-p"){


                            document.querySelectorAll('.popup-active').forEach((e)=>{
                                e.classList.remove('popup-active')
                            })




                    }
                }
            }
           
        }
    });

    document.querySelector('.header i').addEventListener('click',()=>{
        if(document.querySelector('.header i').style.transform=== 'rotate(90deg)'){
            document.querySelector('.header i').style.transform= ''
            document.querySelector('.header__items').classList.remove('ouvert')
            document.querySelector('body').classList.remove('unscrollable')
        }else{
            document.querySelector('.header i').style.transform= 'rotate(90deg)'
            document.querySelector('.header__items').classList.add('ouvert')
            document.querySelector('body').classList.add('unscrollable')
        }
        

    })
    document.querySelectorAll('.header ul li')[0].addEventListener('click',()=>{
            if(document.querySelectorAll('.header ul li')[0].textContent.localeCompare('Notre carte')===0){
                document.querySelector('.header__items').classList.remove('ouvert')
                document.querySelector('.header i').style.transform= ''
            }
            
        })

    document.querySelector('.arrow_right').addEventListener('click', () => {
        const newScrollPosition = caroussel.scrollLeft + scrollAmount;
        scrollCaroussel(newScrollPosition);
    });
    document.querySelector('.arrow_left').addEventListener('click', () => {
        const newScrollPosition = caroussel.scrollLeft - scrollAmount;
        scrollCaroussel(0);
    });

    function scrollCaroussel(scrollPosition) {
        caroussel.style.transition = 'scroll-left 0.3s ease-in-out';
        const startScrollPosition = caroussel.scrollLeft;
        
        // Utilisez requestAnimationFrame pour créer une animation fluide
        function animateScroll(time) {
            const elapsed = time - startTime;
            const progress = Math.min(elapsed / 300, 1); // 300ms est la durée de la transition

            caroussel.scrollLeft = startScrollPosition + (scrollPosition - startScrollPosition) * progress;

            if (progress < 1) {
                requestAnimationFrame(animateScroll);
            } else {
                caroussel.style.transition = 'none'; // Réinitialisez la transition après son exécution
            }
        }

        const startTime = performance.now();
        requestAnimationFrame(animateScroll);
    }

    document.querySelectorAll('.caroussel__item-popup-button').forEach((butpopup, index) => {
        butpopup.addEventListener('click',()=>{
            document.querySelectorAll('.popup-active').forEach((e)=>{
                e.classList.remove('popup-active')
            })
            document.querySelectorAll('.caroussel__item-popup')[index].classList.toggle('popup-active')

        })

    })

    let cpt = 0;
    const tab = ['slider_2.jpg', 'slider_3.jpg', 'slider_4.jpg', 'slider_5.jpg', 'slider_6.jpg'];
    
    setInterval(() => {
        if (cpt === tab.length - 1) {
            cpt = 0;
        } else {
            cpt++;
        }
        
        const sliderImg = document.querySelector('.slider__img');
        sliderImg.style.opacity = 0; // Réduire l'opacité à zéro
        sliderImg.style.backgroundColor = 'green'; // Changer la couleur de fond en vert
    
        setTimeout(() => {
            sliderImg.setAttribute('src', 'images/slider/' + tab[cpt]);
            
        }, 300);
        setTimeout(() => {
            sliderImg.style.opacity = 1; // Rétablir l'opacité à un après avoir changé l'image
        }, 500); // Attendre 500 millisecondes pour la transition de l'opacité
    }, 5000); // 3000 millisecondes = 3 secondes

    

});


