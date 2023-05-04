let resize = document.getElementById("section");
let officeImage = document.getElementById("sectionImage");
let navImage = document.getElementById("navImage");
let navContent = document.getElementById("navContent");
if (window.innerWidth < 990){
    resize.classList.remove("col-5");
    officeImage.classList.add("d-none");
    navImage.classList.remove("d-none");
    navContent.classList.add("content");
}

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