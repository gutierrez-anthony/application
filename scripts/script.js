/*
Javascript logic for all Internship Application pages.
Author: Anthony Gutierrez
File: script.js
Date: 5/5/2023
*/

// Selecting Elements
let resize = document.getElementById("section");
let officeImage = document.getElementById("sectionImage");
let navImage = document.getElementById("navImage");
let navContent = document.getElementById("navContent");

// If the window length when the user enters the site is less than 990px
if (window.innerWidth < 990){
    resize.classList.remove("col-5");
    officeImage.classList.add("d-none");
    navImage.classList.remove("d-none");
    navContent.classList.add("content");
}

// Whenever the user adjusts the size of the window
window.addEventListener("resize", function() {
    if (window.innerWidth < 990){
        resize.classList.remove("col-5");
        officeImage.classList.add("d-none");
        navImage.classList.remove("d-none");
        navContent.classList.add("content");
    }
    else if(window.innerWidth > 990){
        resize.classList.add("col-5");
        officeImage.classList.remove("d-none");
        navImage.classList.add("d-none");
        navContent.classList.remove("content");
    }
});