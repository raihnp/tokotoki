var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    console.log(slideIndex + " + " + n);
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slide");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    index = slideIndex;

    for (i = 0; i < 4; i++) {
        if (index > slides.length) { index = 1; }

        console.log(slides[index - 1].textContent);
        slides[index - 1].style.order = i + 1;
        slides[index - 1].style.display = "flex";

        index += 1;
    }
}