const overallOverlay = document.querySelector(".overall-overlay");
const navMenu = document.querySelector(".nav-menu");
// const usernameAndLogout = document.querySelector(".username-and-logout");
const menuBtn = document.querySelector(".menu-btn");

const navToggle = document.querySelector(".nav-toggle");
const navToggleLists = document.querySelector(".nav-toggle-lists ul");

const slideNext = document.querySelector(".slide-next");
const slidePrevious = document.querySelector(".slide-previous");
const sliderContainer = document.querySelector(".slider-container");

// Show and Hide Password
function showhidepassword() {
  const checkBox = document.getElementById("myCheck");
  const label = document.getElementById("label");
  const pass = document.querySelector(".password");

  if (checkBox.checked == true) {
    label.innerHTML = "Hide password";
    pass.type = "text";
  } else {
    label.innerHTML = "Show password";
    pass.type = "password";
  }
}

// Menu Button Clicking Event
menuBtn.addEventListener("click", (e) => {
  e.preventDefault();
  navMenu.style = `
        right : 0px;
    `;
  overallOverlay.style = `
        display : block;
    `;
});

// Overall Overlay Clicking Event
overallOverlay.addEventListener("click", (e) => {
  e.preventDefault();
  navMenu.style = `
        right : -100%;
    `;
  overallOverlay.style = `
        display : none;
    `;
});

// SLIDE NEXT
slideNext.addEventListener("click", () => {
  sliderContainer.classList.remove("slide-pre-target");
  sliderContainer.classList.add("slide-next-target");
  slideNext.style = "display:none;";
  slidePrevious.style = "display:flex;";
});

slidePrevious.addEventListener("click", () => {
  sliderContainer.classList.remove("slide-next-target");
  sliderContainer.classList.add("slide-pre-target");
  slideNext.style = "display:flex;";
  slidePrevious.style = "display: none;";
});

function triggerClick(e) {
    document.querySelector('#profileImage').click();
}
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

// Add Payment Popup
// const paymentMethodBtn = document.getElementById("paymentMethodBtn");
// const popupOverlay = document.getElementById("popupOverlay");
// const closePopup = document.getElementById("close-popup-form");
// const cancelPopup = document.getElementById("popup-form-cancel");

// paymentMethodBtn.addEventListener("click", (e) => {
//   e.preventDefault();
//   popupOverlay.classList.add("popup-active");
// });
// popupOverlay.addEventListener("click", (e) => {
//   e.preventDefault();
//   popupOverlay.classList.remove("popup-active");
// });
// closePopup.addEventListener("click", (e) => {
//   e.preventDefault();
//   popupOverlay.classList.remove("popup-active");
// });
// cancelPopup.addEventListener("click", (e) => {
//   e.preventDefault();
//   popupOverlay.classList.remove("popup-active");
// });



const menu = document.querySelector(".menu")
const mobileSize = document.querySelector(".mobile-size")

menu.addEventListener("click", () => {
    mobileSize.classList.toggle("show")
})

function showhidepassword(){
    const checkBox = document.getElementById("myCheck");
    const label = document.getElementById("label");
    const pass = document.querySelector(".password");

    if(checkBox.checked == true){
        label.innerHTML="Hide password";
        pass.type = "text";
    }else{
        label.innerHTML="Show password";
        pass.type = "password";
    }
}