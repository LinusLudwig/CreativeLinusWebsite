// Get all elements with class "on-scroll-hidden"
var elements = document.querySelectorAll('.on-scroll-hidden');

// Loop through the elements and replace the class
elements.forEach(function(element) {
    element.classList.replace('on-scroll-hidden', 'js-hidden');
});

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add('on-scroll-show');
        }
    });
});

const hiddenElements = document.querySelectorAll('.js-hidden');
hiddenElements.forEach((el) => observer.observe(el));