const swiper = new Swiper('.swiper', {
  // Optional parameters
  slidesPerView: 'auto',
  direction: 'horizontal',
  spaceBetween: '20',
  centeredSlides: 'true',
  grabCursor: 'true',
  loop: true,

  // If we need pagination
//   pagination: {
//     el: '.swiper-pagination',
//   },

  // Navigation arrows
  // navigation: {
  //   nextEl: '.swiper-button-next',
  //   prevEl: '.swiper-button-prev',
  // },

  // And if we need scrollbar
//   scrollbar: {
//     el: '.swiper-scrollbar',
//   },
});




const menuToggle = document.querySelector('.menu-toggle');
const menuClose = document.querySelector('.menu-close');
const menuPanel = document.querySelector('.menu-panel');
const body = document.body;

function openMenu() {
    menuPanel.classList.add('is-open');
    menuToggle.setAttribute('aria-expanded', 'true');
    body.classList.add('menu-open');
    menuClose.focus(); // moves focus into the panel
}

function closeMenu() {
    menuPanel.classList.remove('is-open');
    menuToggle.setAttribute('aria-expanded', 'false');
    body.classList.remove('menu-open');
    menuToggle.focus(); // returns focus to the trigger button
}

menuToggle.addEventListener('click', openMenu);
menuClose.addEventListener('click', closeMenu);

// Close on Escape key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && menuPanel.classList.contains('is-open')) {
        closeMenu();
    }
});

// Close if window is resized back to desktop while panel is open
window.addEventListener('resize', function () {
    if (window.innerWidth > 768 && menuPanel.classList.contains('is-open')) {
        closeMenu();
    }
});