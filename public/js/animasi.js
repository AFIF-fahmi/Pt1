// Animasi fade-in untuk elemen dengan class .fade-in-anim
// Akan otomatis memberikan delay berurutan

document.addEventListener('DOMContentLoaded', function() {
    const posts = document.querySelectorAll('.fade-in-anim');
    posts.forEach((el, i) => {
        el.style.animationDelay = (i * 0.15) + 's';
    });
}); 