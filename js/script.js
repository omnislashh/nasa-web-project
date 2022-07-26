let myToggleButton = document.querySelector('.toggle-button');
let x = document.querySelector('.ul-menu');
let y = document.querySelector('.page-content');

function handlermyToggleFunction(e) {
    console.log("myToggleFunction");
    
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "flex";
    }
  }
  
  function initHandlermyToggleFunction() {
    myToggleButton.addEventListener("click",handlermyToggleFunction);
  }
  
  window.addEventListener("load",initHandlermyToggleFunction);