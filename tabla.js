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
        var año=$('#txt_año').val(data[2]);
        var stock=$('#txt_stock').val(data[3]);
        var fabricante=data[4];
        var estado=data[6];
        var accesorio=data[7];
        
        if(fabricante=="Remington Arms"){
            document.getElementById(
                "select_fabricante").selectedIndex = 0;
        }
        if(fabricante=="FAMAE"){
            document.getElementById(
                "select_fabricante").selectedIndex = 1;
        }
        if(fabricante=="Corporación Kalashnikov"){
            document.getElementById(
                "select_fabricante").selectedIndex = 2;
        }


        if(estado=="Nuevo"){
            document.getElementById(
                "select_estado").selectedIndex = 0;
        }
        if(estado=="Usado"){
            document.getElementById(
                "select_estado").selectedIndex = 1;
        }
        if(estado=="Deteriorado"){
            document.getElementById(
                "select_estado").selectedIndex = 2;
        }
        if(estado=="Desarmado"){
            document.getElementById(
                "select_estado").selectedIndex = 2;
        }

        if(accesorio=="SI"){
            document.getElementById(
                "select_accesorio").selectedIndex = 0;
        }
        if(accesorio=="NO"){
            document.getElementById(
                "select_accesorio").selectedIndex = 1;
            }
      
       
       
     
    });
    
   
    
        
    });

    

