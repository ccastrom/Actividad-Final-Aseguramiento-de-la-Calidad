$(document).ready(function(){
    $("#btn_create_user").prop('disabled',true);
    $("#alertRut").hide();
    $("#alertRutSuccess").hide();
    
    emptyFields();
});



function emptyFields(){

    $("#form_create_user").on('keyup',function(e){
        var txtNombre=$("#txtNombre").val();
        var txtApellidoPat=$("#txtApellidoPat").val();
        var txtApellidoMat=$("#txtApellidoMat").val();
        var txtrut=$("#txtrut").val();
        var txtcorreo=$("#txtcorreo").val();
        var txtcontra=$("#txtcontra").val();   
        var select_Perfil=$("#select_Perfil").val();
        
        if(txtNombre=="" || txtApellidoPat=="" ||txtApellidoMat==""|| txtrut==""||txtcorreo==""||txtcontra==""||txtcontra.length<3 || select_Perfil=="" ||!Fn.validaRut( $("#txtrut").val())){
            
            $("#btn_create_user").prop('disabled',true);
            
        }else{
            $("#btn_create_user").prop('disabled',false);
        }
    });
};

$("#txtrut").on('keyup',function(){
  console.log(Fn.validaRut($("#txtrut").val()));
    if (Fn.validaRut( $("#txtrut").val() )){
        $("#alertRut").hide();
        $("#alertRutSuccess").show();
        
      
        
        
    } else {
        $("#alertRut").show();
        $("#alertRutSuccess").hide();
       
       
    }
    if($("#txtrut").val()<=0){
        $("#alertRut").hide();
        $("#alertRutSuccess").hide();
        

        
    }
  });
  
  
       Fn = {
          // Valida el rut con su cadena completa "XXXXXXXX-X"
          validaRut : function (rutCompleto) {
            rutCompleto = rutCompleto.replace("‐","-");
            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto )){
              console.log('primer if');
              return false;
            }
              
            var tmp   = rutCompleto.split('-');
            var digv  = tmp[1]; 
            var rut   = tmp[0];
            if ( digv == 'K' ) digv = 'k' ;
            if(Fn.dv(rut) == digv){
              console.log(Fn.dv(rut));
              return true;
            }else{
              return false;
            }
            // return (Fn.dv(rut) == digv );
          },
          dv : function(T){
            var M=0,S=1;
            for(;T;T=Math.floor(T/10))
              S=(S+T%10*(9-M++%6))%11;
            return S?S-1:'k';
          }
        }

