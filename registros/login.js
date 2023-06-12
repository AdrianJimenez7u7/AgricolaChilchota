document.getElementById("formulario").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var username = document.getElementById(".empleado").value;
    var password = document.getElementById(".contraseña").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById("message").innerHTML = response.message;
            if (response.success) {
                // Redirigir a la página de inicio después de iniciar sesión exitosamente
                window.location.href ="index.php";
            }
        }
    };
    var data = "username=" + username + "&password=" + password;
    xhr.send(data);
});