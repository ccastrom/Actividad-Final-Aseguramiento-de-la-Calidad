$(document).ready(function() {
    var table=$('#table_armas').DataTable({
        scrollY: true,
        scrollX: true, 
        select:true,
      
        "order":[[0,"desc"]],
        select: {
          style: 'single'
      },
      
        
        "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "No existen resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Resultados no disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search":"Buscar: ",
            "paginate":{
                "next":'Siguiente',
                "previous":'Anterior'
            },
            select: {
                rows: {
                    _: "Se han seleccionado %d filas",
                    0: "",
                    1: " Una fila seleccionada"
                }
            }
               
        },
        pageLength: 10,
        lengthMenu: [5, 10,15],
        "columnDefs": [
            {"visible": false, "targets": 0}
          ],
          
        }); 

        
    $('#table_armas').on( 'click', 'tr', function () {
    
        var data = table.row( this ).data();
        var id=$('#txt_id').val(data[0]);
        var id=$('#txt_id_eliminar').val(data[0]);
        var nomnre=$('#txt_nombre').val(data[1]);
        var ap_pat=$('#txt_ap_pat').val(data[2]);
        var ap_mat=$('#txt_ap_mat').val(data[3]);
        var correo=$('#txt_correo').val(data[4]);
        var rol=data[6];
        
        
        if(rol=="ADMIN"){
            document.getElementById(
                "select_rol").selectedIndex = 0;
        }
        if(rol=="NORMAL"){
            document.getElementById(
                "select_rol").selectedIndex = 1;
        }
       
      
       
       
     
    });
    
   
    
        
    });

    

