
   $(document).ready(function(){

    var arrayObj = []; // se declara en este ambito para que no pierda su valor mientras la funcion se invoca
    var total = 0;
    document.getElementById('totalPagarFinal').innerHTML =  total.toFixed(2).toString();
    
    // Actualizando
    $(".btn-update-item").on('click', function(e){
        e.preventDefault();
        
        var id = $(this).data('id');
        var articulo = $(this).data('articulo'); //obteniendo el objeto articulo
        articulo.cantidad = $("#articulo_" + id).val(); //seteando la cantidad en el objeto
        var href = $(this).data('href');
        var precioArt = $(this).data('precio');
        var cantidad = $("#articulo_" + id).val();

        var subtotal = precioArt * parseInt(cantidad);
        articulo.subTotal = subtotal;
        document.getElementById('totpagar'+id).innerHTML = "$" + subtotal.toFixed(2).toString();
        //se deberá filtrar y verificar si el objeto existe en el array si existe hacer un remove sino un push 
       var indexelem = arrayObj.findIndex(y => y.idarticulo === id); // si es -1 no existe en array
      // se obtiene el indice del elemento en el array
       if(indexelem != -1){
        arrayObj.splice(indexelem,1);
       }
        // se tendra que crear un array de objetos que guarde el id del articulo y su sub-total a pagar 
        var objArt = {idArt: id, subTotal: subtotal}; // crea un objeto con propiedades idArt y subtotal
       
        arrayObj.push(articulo);//inserta el objeto en el array
       var ArrayTotales = arrayObj.map(x => x.subTotal); // array que contiene todos los sub-totales
       total = 0; // cuando reconoce un nuevo elemento en el array setea el total a 0 para que array de subtotales calcule nuevo total
       for(var valor in ArrayTotales){
           total = total + ArrayTotales[valor] ; // se asigna un valor al total cuando se recorre el array
       }
       document.getElementById('totalPagarFinal').innerHTML = total.toFixed(2).toString(); //setea valor

       document.getElementById("valObj").value = JSON.stringify(arrayObj);

       
    });
   });

   function Pagar(){
       var data= document.getElementById("valObj").value;
    
    var datastring = JSON.stringify(data);

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/detalle-orden",
        data: {myData: data},
        type: 'GET',
        success: function(response) {
           alert(response);
        }
     });
   }
