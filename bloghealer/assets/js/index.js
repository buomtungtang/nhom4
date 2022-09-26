// function dropdown
function navbarDropdown(){
    document.querySelector(".dropdown").classList.toggle("flex");
}
function categoryDrop(){
    document.querySelector(".navbar__categories--sub").classList.toggle("flex");
}
// window.onclick = function(e) {
//     if (!e.target.matches('.btnDrop')) {
//     const dropdown = document.querySelector(".navbar_dropdown");
//       if (dropdown.classList.contains('flex')) {
//         dropdown.classList.remove('flex');
//       }
//     }
//   }
function handleToggle(){
  const listE = documnent.getElementsByClassName('dropdown');
  if(listE.length){
    const firstE = listE[0];
    firstE.classList.toggle("flex");
  }
}
function ToggleVisi(){
  const listE = document.getElementsByClassName("overlay-front");
  if(listE.length){
    const firstE = listE[0];
    firstE.classList.toggle("visible");
  }
}

// convert vietnamese to string with "-"
function removeAccents(str) {
  return str.normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D');
}
function convertVnese(txt){
  const name = txt;
  const name1 = _.lowerCase(name);
  const arrName = _.compact(name1.split(" "));
  const name2 = arrName.join("-");
  const result = removeAccents(name2);
  return result;
}
function convertCate(event){
  const e = document.getElementById("name-convert");
  let name = event.value;
  e.value = convertVnese(name);
}

let arrHeaderIdx = document.getElementsByClassName("box--item-category");
if(arrHeaderIdx.length){
  for(let i =6; i<arrHeaderIdx.length;i++){
    arrHeaderIdx[i].style.display = 'none';
  }
  const fake01 = convertVnese(document.querySelector("title").innerText);
  console.log(fake01);
  for(let i =0; i<6;i++){
    const draft = convertVnese(arrHeaderIdx[i].getElementsByClassName("category--item")[0].innerText);
    if( fake01 == draft){
      arrHeaderIdx[i].getElementsByClassName("category--item")[0].style.color = '#63b3ed !important';
      break;
    }
  }
}
let navbarCateSub = document.querySelectorAll(".navbar__categories--sub .item");
if(navbarCateSub.length){
  for(let i=0;i<6;i++){
    navbarCateSub[i].style.display = 'none';
  }
}
// get content input
// function getContent(event){
//   const e1 = event.innerText;
//   event.querySelector("input").setAttribute('value',e1);
//   console.log('event==',event); 
// }
function getTitle(event){
  const e1 = event.innerText;
  const e2 =  document.querySelector("#name-title").setAttribute('value',e1);
  const e3 = convertVnese(e1);
  const e4 = document.querySelector("#name-convert").setAttribute('value',e3);
  console.log('title ==',event);
}
function getContent(event){
  const e1 = event.innerText;
  console.log('txt==',e1); 
  const e2 = document.querySelector("#post_content").setAttribute('value',e1);
  console.log('content==',event);
}
// get content input
// function getTitle(event){
//   const e1 = event.innerText;
//   const e2 = event.querySelector("#name-title");
//   e2.setAttribute('value',e1);
//   //e2.setAttribute('value',e1);
//   console.log('e1==',e1);
//   console.log('e2==',e2);
//   console.log('event==',event);
// }
//get name title
  // const getTxt = document.getElementById("name-title").value;
  // console.log('getTxt==',getTxt);
  // const txtConvert = convertVnese(getTxt);
  // const nameConvert = document.getElementById("name-convert");
  // nameConvert.value = txtConvert;
  // console.log('result==',nameConvert.value);

// 
function toggleSearch(){
  const listE = document.getElementsByClassName("search");
  if(listE.length){
    const firstE = listE[0];
    firstE.classList.toggle("show");
  }
}
// 
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
  // options
  cellAlign: 'left',
  contain: true,
  wrapAround:false,
  groupCells: true,
  groupCells:1,
  lazyload : true,
});

// element argument can be a selector string
//   for an individual element
var flkty = new Flickity( '.main-carousel', {
  // options
});




// AJax
// $(document).ready(function(){
//   alert('load thành công');
    
//   });
// filter gallery
function filterIdx(){
  const arr = document.getElementsByClassName("filter-item");
  if(arr.length){
    console.log("arr=",arr);
  }
}