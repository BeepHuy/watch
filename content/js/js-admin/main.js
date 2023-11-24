// let nav = document.querySelector(".nav-side-menu");
// let link = document.querySelectorAll(".link");
// link.forEach(function(a){
//      a.addEventListener("click", function(){
//           nav.querySelector(".active").classList.remove("active");
//           a.classList.add("active");
//      })
// })

// const activePage = window.location.pathname;
// const links = document.querySelectorAll("a");
// links.forEach(link => {
//      if(link.href.includes(`${activePage}`)){
//           link.classList.remove('active');
//         link.classList.add('active');
//      }
// })

const currentLocation = location.href;
// const currentLocationCut = currentLocation.substring(16, currentLocation.length);
const menuItem = document.querySelectorAll(".link");
const menuLength = menuItem.length;
console.log(currentLocation);
for (let i = 0; i < menuLength; i++) {
     console.log(menuItem[i].href);
     if(menuItem[i].href === currentLocation) {
          menuItem[i].classList.add("active");
     }
}