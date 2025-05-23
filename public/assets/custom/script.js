window.addEventListener("scroll", function() {
    let navbar = document.querySelector(".navbar");
    if (window.scrollY > window.innerHeight * 0.3) { // 50vh dikonversi ke pixel
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});
