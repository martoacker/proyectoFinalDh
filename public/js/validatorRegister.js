window.addEventListener("load", function(){
  var form = window.form = document.getElementById("formRegister");

  form.addEventListener('input', function (e) {
    var formGroup = e.target.closest('.form-group')
    formGroup.classList.remove('has-error')
    formGroup.querySelectorAll('.help-block').forEach(function (el) {
      el.remove()
    })
  })

  form.onsubmit = function(e){

    var nombre = document.querySelector("input[name=first_name]").value;
    var apellido = document.querySelector("input[name=last_name]").value;
    var mail = document.querySelector("input[name=email]").value;
    var pass = document.querySelector("input[name=password]").value;
    var passConf = document.querySelector("input[name=password_confirmation]").value;

    var validMailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/
    var errors = {}

    if (nombre.length === 0) {
      errors.first_name = "Nombre requerido"
    }

    if (apellido.length === 0) {
      errors.last_name = "Apellido requerido"
    }

    if (mail.length === 0) {
      errors.email = "Es requerido"
    } else if (!validMailRegex.test(mail)) {
      errors.email = "El mail es inválido"
    }

    if (pass.length <= 5 || pass.length >= 13) {
      errors.password = "Contraseña debe tener entre 6 y 12 caracteres"
    }

    if (pass != passConf) {
      errors.password_confirmation = "Las contraseñas no coinciden"
    }


    form.querySelectorAll('.help-block').forEach(function (el) {
      el.remove()
    })
    form.querySelectorAll('.form-group').forEach(function (el) {
      el.classList.remove('has-error')
    })

    if (Object.keys(errors).length > 0) {
      e.preventDefault();
      Object.keys(errors).forEach(function (name) {
        var mensaje = document.createElement('p')
        mensaje.innerText = errors[name]
        mensaje.classList.add('help-block')
        var formGroup = document.querySelector("input[name=" + name + "]").closest('.form-group')
        formGroup.classList.add('has-error')
        formGroup.append(mensaje)
      })
    }

  }
}
)
