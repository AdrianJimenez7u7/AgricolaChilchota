document.getElementById('openModalBtn').addEventListener('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'block';
  });
  
  document.getElementsByClassName('close')[0].addEventListener('click', function() {
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
  });
  
  document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Evita que el formulario se envíe
  
    var formData = new FormData(this);
  
    // Realiza cualquier acción adicional con los datos del formulario aquí
    var inputs = document.querySelectorAll('#myForm input');
    inputs.forEach(function(input) {
      console.log('Valor de ' + input.name + ': ' + input.value);
    });
  
    // Cierra el modal
    var modal = document.getElementById('myModal');
    modal.style.display = 'none';
  });