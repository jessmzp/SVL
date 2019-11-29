
   $(document).ready(function(){

    // Actualizando
    $(".btn-update-item").on('click', function(e){
        e.preventDefault();
        
        var id = $(this).data('id');
        var href = $(this).data('href');
        var precioArt = $(this).data('precio');
        var cantidad = $("#articulo_" + id).val();

        var subtotal = precioArt * parseInt(cantidad);
        document.getElementById('totpagar'+id).innerHTML = "$" + subtotal.toFixed(2).toString();
       
    });
   });
