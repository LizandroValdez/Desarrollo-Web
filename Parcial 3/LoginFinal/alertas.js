Swal.fire({
   title: "Bienvenido!",
  icon: 'success'
});

var formulario = document.getElementById('formulario');

formulario.addEventListener('submit',function(e){
    e.preventDefault();
    console.log('me diste un clic')
})
