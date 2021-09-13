/* CAMPOS OBRIGATÓRIOS DO FORM */
inputs = document.querySelectorAll("#fields");
fieldMsg = document.querySelectorAll("#field-msg")

inputs.forEach((field, i) => {
  field.addEventListener("click", () => {
    field.style.border="3px solid rgba(230, 217, 36, 0.932)"
    fieldMsg[i].style.opacity="1";
  })

  field.onkeyup = function() {
    field.style.border="3px solid green"
    fieldMsg[i].style.opacity="0";
  }
})