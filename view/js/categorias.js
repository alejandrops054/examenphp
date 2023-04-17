//consultar get por ajax 
$(".tablas").on("click", ".btnEditarCategoria", function(){

    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url:"ajax/categoria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success: function(respuesta){
        console.log("aqui estoy")
        $("#id").val(respuesta["id"]);
        $("#editarcategoria").val(respuesta["categoria"]);
        $("#editarruta").val(respuesta["ruta"]);
        $("#editarestado").val(respuesta["estado"]);
       }
    })
});

//Se deja funcion preparada por si se cosume api externas de consulta
// $(".tablas").on("click", ".btnEditarCategoria", function(){
//     var id = $(this).attr("editarCategoria");
//    axios.get("consumir api en caso de ser necesario"+id)
//    .then(function(data){
//     const dataPrimary = data.data.data.recordsets[0][0];

//     $('#categoria').val(dataPrimary.categoria);
//     $('#ruta').val(dataPrimary.ruta);
//     $('#estado').val(dataPrimary.estado);
//    }).catch(function(error){
//         console.log("error al consumir api");
//         $('#error').val("hay un error al consultar api");
//    });
// });

$(".tablas").on("click", ".btnEliminaridCategoria", function(){
    var idCategoria = $(this).attr("idCategoria");

    console.log(idCategoria);
    Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Quieres eliminar este elemento?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;

        }

    })
})