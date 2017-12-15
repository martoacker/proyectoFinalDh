window.addEventListener("load", function(){
  var form = window.form = document.getElementById("formNewCourse");

  form.addEventListener('input', function (e) {
    var formGroup = e.target.closest('.form-group')
    formGroup.classList.remove('has-error')
    formGroup.querySelectorAll('.help-block').forEach(function (el) {
      el.remove()
    })
  })

  form.onsubmit = function(e){

    var titulo = document.querySelector("input[name=titulo]").value;
    var descripcion = document.querySelector("textarea").value;
    var categoria = document.querySelector("select[name=categoria]").value;
    var modalidad = document.querySelectorAll("input[name=modalidad]");
    var precio = document.querySelector("input[name=precio]").value;
    var errors = {}


    if (titulo.length === 0) {
      errors.titulo = "Completa el titulo"
    }

    if (descripcion.length === 0) {
      errors.descripcion = "Describi el curso"
    }

    if (isNaN(categoria)) {
      errors.categoria = "Seleccione una categoria"
    } else if (categoria.value <= 0 || categoria.value >=23) {
      errors.categoria = "Seleccione una categoria"
    }

    if(!modalidad[0].checked && !modalidad[1].checked){
      errors.modalidad = "Seleccione una modalidad"
    }

    if (precio.length === 0) {
      errors.precio = "Completa el precio"
    } else if (precio.value <=0) {
      errors.precio = "El precio no puede ser negativo"
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
        var formGroup = document.getElementById(name).closest('.form-group')
        formGroup.classList.add('has-error')
        formGroup.append(mensaje)
      })
    }

  }
}
)
