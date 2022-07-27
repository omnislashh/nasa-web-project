let myToggleButton = document.querySelector('.menu-togglebutton');
let x = document.querySelector('.topnavMobile');
// let y = document.querySelector('.page-content');

function handlermyToggleFunction(e) {
    console.log("myToggleFunction");
    
    if (x.style.display === "none") {
        x.style.display = "block";
        // y.style.display = "none";
    } else {
        x.style.display = "none";
        // y.style.display = "flex";
    }
  }
  
  function initHandlermyToggleFunction() {
    myToggleButton.addEventListener("click",handlermyToggleFunction);
  }
  
  window.addEventListener("load",initHandlermyToggleFunction);