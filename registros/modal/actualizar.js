        const seccion = document.querySelector(".clientes-container");
        $(seccion).load('tabla.php');
        $(document).ready(function(){
        setInterval( function(){
            $(seccion).load('tabla.php');
        },60000);
    });
