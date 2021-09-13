let open = document.querySelector('#btn-menu');
let close = document.querySelector('#btn-close');

open.addEventListener("click", () => {
  document.querySelector('.modal').style.width="100%";
})

close.addEventListener("click", () => {
  document.querySelector('.modal').style.width="0px"
})

/* Confirmar antes de saír da conta */
const confirmExit = () => {
  let confirm = document.querySelector('#confirm');
  let cancel = document.querySelector('#cancel');

  document.querySelector('.confirmLogout').classList.remove('hidden');

  confirm.addEventListener("click", () => {
    location.href="php/crud-usuarios.php?logout";
  })

  cancel.addEventListener("click", () => {
    document.querySelector('.confirmLogout').classList.add('hidden');
  })
}

/* ===== ABRIR UMA JANELA "SOBRE" ==== */
let openAbout = document.querySelector("#btn-sobre");
let openAboutMobile = document.querySelector("#btn-sobre-mobile");
let closeAbout = document.querySelector("#close-about");
let modalAbout = document.querySelector(".modal-about");

openAbout.onclick = function() {
  modalAbout.classList.remove("hidden");
}

openAboutMobile.onclick = function() {
  modalAbout.classList.remove("hidden");
}

closeAbout.onclick = function() {
  modalAbout.classList.add("hidden");
}

