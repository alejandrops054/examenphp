//consultar get por ajax 
$(".tablas").on("click", ".btnEditarSubCategoria", function(){

    var idSubCategoria = $(this).attr("idSubCategoria");

    var datos = new FormData();
    datos.append("idSubCategoria", idSubCategoria);

    $.ajax({
        url:"ajax/subcategoria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success: function(respuesta){
        console.log("aqui estoy subcategoria",respuesta)
        $("#id").val(respuesta["id"]);
        $("#editarSubcategoria").val(respuesta["subcategoria"]);
        $('#subcategoriaid').html(respuesta["id_categoria"]);
        $("#editarruta").val(respuesta["ruta"]);
        $("#editarestado").val(respuesta["estado"]);
       }
    })
});