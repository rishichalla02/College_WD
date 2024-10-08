$(document).ready(function () {
    let currentSlide = 0;
    const totalSlides = $(".slides img").length;

    function showSlide(index) {
        const newLeft = -index * 100 + "%";
        $(".slides").css("transform", "translateX(" + newLeft + ")");
    }

    $(".next").click(function () {
        currentSlide = (currentSlide + 1) % totalSlides; showSlide(currentSlide);
    });

    $(".prev").click(function () {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; showSlide(currentSlide);
    });
});    