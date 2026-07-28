// import SplitType from 'split-type'
// import * as THREE from 'three';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

import { Flip } from "gsap/Flip";
import { Draggable } from "gsap/Draggable";
import { MotionPathPlugin } from "gsap/MotionPathPlugin";
import { TextPlugin } from "gsap/TextPlugin";
import Lenis from "lenis";

gsap.registerPlugin(Flip, Draggable, MotionPathPlugin, TextPlugin);

gsap.registerPlugin(ScrollTrigger);

// ////////////lenis smoothscol//start////////////////
// Initialize Lenis
const lenis = new Lenis({
  autoRaf: true,
});

// Listen for the scroll event and log the event data
lenis.on("scroll", (e) => {});

// ////////////lenis smoothscol//end////////////////

// //////////////////////BUBBLE START//////////////////////////
// Select elements
let clippedPath = document.querySelector("#clippedPath");
let shadowPath = document.querySelector("#shadowPath");
let images = document.querySelectorAll(".fading-image");

// Path Morph Animation (Applies to both the clipping path and the shadow)
// use https://boxy-svg.com/ set viewBox="0 0 500 500"
// draw you path paste the d attribute here and make variation paste the d: attribute variation in the html svg

// TIMELINE COMMENTED OUT FOR DEBUGGING
let mainBubbleTimeline = gsap.timeline({ repeat: -1, yoyo: true });
// ITMEline COMMENTED OUT FOR DEBUGGING

// animated svg variation here
mainBubbleTimeline.to([clippedPath, shadowPath], {
  attr: {
    d: "M 13.016 311.835 C -2.45 278.275 5.108 195.157 51.09 143.406 C 105.089 82.632 123.786 -5.126 183.643 21.564 C 248.208 50.353 296.762 34.202 392.479 29.919 C 482.036 25.912 489.215 164.492 484.088 188.562 C 470.83 250.806 446.192 240.197 479.724 344.561 C 509.355 436.785 450.881 400.276 344.214 465.22 C 320.845 479.448 169.383 524.042 93.614 450.37 C 68.771 426.215 49.877 391.818 13.016 311.835 Z",
  },
  duration: 5,
});

mainBubbleTimeline.to([clippedPath, shadowPath], {
  attr: {
    d: "M 49.214 445.489 C 33.748 411.929 -13.455 303.751 32.527 252 C 86.526 191.226 -14.509 77.479 67.624 22.492 C 126.367 -16.836 163.108 28.633 258.825 24.35 C 348.382 20.343 442.062 21.56 457.171 40.986 C 500.53 96.733 433.197 130.675 466.729 235.039 C 496.36 327.263 486.15 349.228 437.028 432.735 C 423.156 456.317 334.718 517.21 241.19 468.006 C 200.568 446.635 86.075 525.472 49.214 445.489 Z",
  },
  duration: 5,
});

// targeting the image class="fading-image" in the html svg itself
// Timeline for Fading Images

// fading images inside the bubble
let imagesFadeInOutTimeline = gsap.timeline({ repeat: -1 }); // Loop infinitely

images.forEach((img, i) => {
  let nextImg = images[(i + 1) % images.length]; // Get next image in sequence

  imagesFadeInOutTimeline.to(img, { autoAlpha: 0, duration: 2, delay: 3 }); // Fade out current image

  imagesFadeInOutTimeline.to(nextImg, { autoAlpha: 1, duration: 2 }, "-=2"); // Fade in next image at the same time
});

// //////////////////////BUBBLE END ///////////////////////////

// /////////////// gsa scroll bubble break points start /////////////////
// addjust ypercent

let mm = gsap.matchMedia();

mm.add("(min-width: 1280px)", gsapBiggerThan1280);
mm.add("(max-width: 1278px)", gsapSmallerThan1279);
mm.add("(max-width: 1050px)", gsapSmallThan1050);
mm.add("(max-width: 948px)", gsapSmallThan948);

function gsapBiggerThan1280() {
  // setting start rotation and scale of bubble
  gsap.set("#bubbleSVG", {
    scale: 1.2,
    rotate: 0,
  });

  // bubble timeline 1050 +
  let tl = gsap.timeline();

  // first animations left
  tl.to("#bubbleSVG", {
    xPercent: -100,
    yPercent: 130 /*VARY THIS FOR EACH BREAK */,
    rotate: 0,
    scale: 0.8,
  });

  // bubble scroll trigger
  ScrollTrigger.create({
    animation: tl,
    trigger: ".hero .left",
    start: "top 20%",
    end: "top -40%",

    scrub: 1,
    toggleActions: "play none none none",
  });
  // end of of bubble scroll trigger 1050 +
}

function gsapSmallerThan1279() {
  // setting start rotation and scale of bubble
  gsap.set("#bubbleSVG", {
    scale: 1.3,
    rotate: 0,
  });

  // bubble timeline small than 1279 +
  let tl = gsap.timeline();

  // first animations left
  tl.to("#bubbleSVG", {
    xPercent: -100,
    yPercent: 150 /*VARY THIS FOR EACH BREAK */,
    rotate: 0,
    scale: 0.8,
  });

  // bubble scroll trigger
  ScrollTrigger.create({
    animation: tl,
    trigger: ".hero .left",
    start: "top 20%",
    end: "top -40%",
    scrub: 1,
    toggleActions: "play none none none",
  });
}

function gsapSmallThan1050() {
  // setting start rotation and scale of bubble
  gsap.set("#bubbleSVG", {
    scale: 1,
    rotate: 0,
  });

  // bubble timeline small than 1279 +
  let tl = gsap.timeline();

  // first animations left
  tl.to("#bubbleSVG", {
    xPercent: -100,
    yPercent: 150 /*VARY THIS FOR EACH BREAK */,
    rotate: 0,
    scale: 0.8,
  });

  // bubble scroll trigger
  ScrollTrigger.create({
    animation: tl,
    trigger: ".hero .left",
    start: "top 20%",
    end: "top -40%",
    scrub: 1,
    toggleActions: "play none none none",
  });
}

function gsapSmallThan948() {
  // Iterate over all scroll triggers and kill them
  ScrollTrigger.getAll().forEach((trigger) => trigger.kill());
}

// /////////////// gsa scroll bubble break points end /////////////////
