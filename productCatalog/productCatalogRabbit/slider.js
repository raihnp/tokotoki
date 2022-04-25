var slideIndex = 1;
category = [
    'foods',
    'shampoo',
    'accessories',
    'medicine',
    'others'
]

for (i = 0; i < category.length; i++) {
    showSlides(slideIndex, category[i]);
}

// Next/previous controls
function plusSlides(n, target) {
    showSlides(slideIndex += n, target);
}

// Thumbnail image controls
function currentSlide(n, target) {
    showSlides(slideIndex = n, target);
}

function showSlides(n, target) {
    var i;
    var category = document.getElementById(target);
    var slides = category.getElementsByClassName("slide");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    index = slideIndex;

    for (i = 0; i < 5; i++) {
        if (index > slides.length) { index = 1; }

        console.log(slides[index - 1].textContent);
        slides[index - 1].style.order = i + 1;
        slides[index - 1].style.display = "flex";

        index += 1;
    }
}