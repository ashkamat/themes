import { gsap } from "gsap";
import { Flip } from "gsap/Flip";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { Observer } from "gsap/all";
import { _checkPlugin } from "gsap/gsap-core";

gsap.registerPlugin(ScrollTrigger, Flip, Observer);

// outer holder is the only thing that rotates with the bigCircles inside which inturn hold the inside Cirlces

// out circle rotates 360

// Vars
let bigCircles = document.querySelectorAll(".bigCircles");

// actual images in the thumb and flip img
let thumbs = document.querySelectorAll(".thumbs");

// element to flip to:
let bigFlipDiv = document.querySelector(".bigFlipDiv");

// thumb holders
let thumbHolders = document.querySelectorAll(".thumbHolders");

// close button
let close = document.querySelector(".close");

// placeholder on off if anything is flips
let projectPlaceHolder = document.querySelector(".projectPlaceHolder");
// title pulled inside the bigflip (content in the thumb html data attribute )
let projectTitle = document.querySelector(".projectTitle");
// snippet pulled inside the bigflip (content in the thumb html data attribute )
let projectSnippet = document.querySelector(".projectSnippet");

let outerHolder = document.querySelector(".outerHolder");

const projectImages = document.querySelectorAll("img[data-url]");

// --- Configuration ---
const rotationIncrement = 30;
const rotationDuration = 0.8;
const rotationEase = "power1.out";

// --- State ---
let targetRotation = gsap.getProperty(outerHolder, "rotation") || 0;

// --- Initialization ---
gsap.set(outerHolder, { rotation: targetRotation });

// --- Observer Setup ---
Observer.create({
  target: outerHolder, // The element Observer listens to
  type: "wheel, touch", // Observe wheel events
  preventDefault: true, // <--- ADD THIS LINE
  tolerance: 10, // Optional: Helps avoid tiny wheel movements triggering rotation
  onUp: onWheelUp,
  onDown: onWheelDown,
});

// --- Event Handlers ---
// function onWheelUp() {
//   targetRotation += rotationIncrement;
//   gsap.to(outerHolder, {
//     rotate: targetRotation,
//     duration: rotationDuration,
//     ease: rotationEase,
//     overwrite: "auto",
//   });
// }

// function onWheelDown() {
//   targetRotation -= rotationIncrement;
//   gsap.to(outerHolder, {
//     rotate: targetRotation,
//     duration: rotationDuration,
//     ease: rotationEase,
//     overwrite: "auto",
//   });
// }

let isRotating = false;
const throttleDuration = 50; // ms

function onWheelUp() {
  if (isRotating) return;
  isRotating = true;
  targetRotation += rotationIncrement;
  gsap.to(outerHolder, {
    rotate: targetRotation,
    duration: rotationDuration,
    ease: rotationEase,
    overwrite: "auto",
    onComplete: () => {
      setTimeout(() => { isRotating = false; }, throttleDuration);
    }
  });
}

function onWheelDown() {
  if (isRotating) return;
  isRotating = true;
  targetRotation -= rotationIncrement;
  gsap.to(outerHolder, {
    rotate: targetRotation,
    duration: rotationDuration,
    ease: rotationEase,
    overwrite: "auto",
    onComplete: () => {
      setTimeout(() => { isRotating = false; }, throttleDuration);
    }
  });
}

// Make sure 'outerHolder' is defined before this script runs
// const outerHolder = document.querySelector('#your-element-id');

projectImages.forEach((img) => {
  img.addEventListener("click", function () {
    const url = img.getAttribute("data-url");
    if (url) {
      window.location.href = url;
    }
  });
});

// dynamically adding and calculating number of thumbs to add
for (let i = 0; i < bigCircles.length; i++) {
  let degrees = 360 / bigCircles.length;

  degrees = degrees * i + 360 / bigCircles.length;

  gsap.set(bigCircles[i], {
    rotate: degrees,
  });
}

// adding an event listener for each thumb
for (let i = 0; i < thumbs.length; i++) {
  thumbs[i].addEventListener("click", thumbClickedFunction);

  // when clicked this is what happens
  function thumbClickedFunction() {
    // remove project place holder text in the big wheel
    projectPlaceHolder.style.display = "none";

    const state = Flip.getState(thumbs);
    // moving the the thumb to big div
    bigFlipDiv.appendChild(thumbs[i]);

    Flip.from(state, { duration: 1, ease: "power1.inOut" });

    // getting and changing the link to that from the img dataset
    bigFlipDiv.querySelector(".more").href = thumbs[i].dataset.url;
    bigFlipDiv.querySelector(".more").style.display = "grid";

    // custom data for each thumb img pulled in here data is in the img tag in the html

    projectTitle.textContent = thumbs[i].dataset.projectTitleData;

    projectSnippet.textContent = thumbs[i].dataset.projectSnippetData;

    // show the close button
    bigFlipDiv.querySelector(".close").style.display = "grid";

    // fading in the buttons
    let fadeUpAni = gsap.to(".more, .close, .projectTitle, .projectSnippet", {
      duration: 2,
      delay: 1,
      autoAlpha: 1,
    });

    // when clicked hide the thumholder title h3 and h5 inside the thumb
    thumbHolders[i].querySelector("h3").style.display = "none";

    thumbHolders[i].querySelector("h5").style.display = "none";

    // pointer events removed from thumbs
    thumbHolders.forEach(function (item) {
      item.style.pointerEvents = "none";
    });
  }
  // end of thumbclicked function

  // close function////////////////
  // close function////////////////
  close.addEventListener("click", closeBigFlipFunk);

  function closeBigFlipFunk() {
    projectTitle.textContent = "";

    projectSnippet.textContent = "";

    // fading OUT the buttons
    let fadeUpAni = gsap.to(".more, .close, .projectTitle, .projectSnippet", {
      autoAlpha: 0,
    });

    // remove the link from bigDiv
    bigFlipDiv.querySelector(".more").style.display = "none";

    // remove close btn
    bigFlipDiv.querySelector(".close").style.display = "none";

    // put back project place holder text ithe big wheel
    projectPlaceHolder.style.display = "flex";

    // put pointer events back
    thumbHolders.forEach(function (item) {
      item.style.pointerEvents = "auto";
    });

    // append img back back to image place holder
    thumbHolders[i].appendChild(thumbs[i]);

    // put the h3 back in the thumb
    thumbHolders[i].querySelector("h3").style.display = "block";

    //  put the h5 back in the thumb
    thumbHolders[i].querySelector("h5").style.display = "block";
  }
  // end of close function
}
// end of for loop which incluse thumb click and close functions

let wheelMedia = gsap.matchMedia();

wheelMedia.add("(min-width: 1280px)", gsapBiggerThan1280);
wheelMedia.add("(max-width: 1278px)", gsapSmallerThan1279);
wheelMedia.add("(max-width: 1050px)", gsapSmallThan1050);
wheelMedia.add("(max-width: 948px)", gsapSmallThan948);

function gsapBiggerThan1280() {}

function gsapSmallerThan1279() {}

function gsapSmallThan1050() {}

function gsapSmallThan948() {}

// /////////////// gsa scroll bubble break points end /////////////////




const wheelElement = document.querySelector('.njaWheel');

// Prevent mouse wheel scrolling
wheelElement.addEventListener('wheel', (e) => {
  e.preventDefault();
}, { passive: false });

// Prevent touch-based scrolling on mobile
wheelElement.addEventListener('touchmove', (e) => {
  e.preventDefault();
}, { passive: false });