window.addEventListener("load", function(){
  var formIN = window.form = document.getElementById("anotar");


  formIN.onsubmit = function(e){
    var conf = confirm("Estas registrado?")
    if (conf) {
      alert("Suscripto exitosamente")
    } else {
      alert("Debes registrarte")
      e.preventDefault();
      window.location.replace("http://localhost:8000/register");
    }
  }

}
)
