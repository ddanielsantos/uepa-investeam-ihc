/* CAMPOS OBRIGATÓRIOS DO FORM */
inputs = document.querySelectorAll("#fields");
fieldMsg = document.querySelector("#field-msg")

inputs.forEach(field => {
  field.addEventListener("click", () => {
    field.style.border="3px solid rgba(230, 217, 36, 0.932)"
    fieldMsg.style.opacity="1";
  })

  field.onkeyup = function() {
    field.style.border="3px solid green"
    fieldMsg.style.opacity="0";
  }
})

/* CORRIGIR O LABEL PARA MOSTRAR EM TODOS OS CAMPOS */

// fieldMsg.forEach(msg => {
//   msg.addEventListener("click", () => {
//     msg.style.opacity="1";
//   })

//   field.onkeyup = function() {
//     field.style.border="3px solid green"
//     fieldMsg.style.opacity="0";
//   }
// })