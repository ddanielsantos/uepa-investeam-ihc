let open = document.querySelector('#btn-menu');
let close = document.querySelector('#btn-close');

open.addEventListener("click", () => {
  document.querySelector('.modal').style.width="100%";
})

close.addEventListener("click", () => {
  document.querySelector('.modal').style.width="0px"
})