/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
    $("#faturamento_vencimento").mask("9999-99-99");
    
    /**
     * Tipo de Faturamento
     */
    
    $("#faturamento_tipo").change(function() {
       
        var tipo = $(this).val();        
        if (tipo == 2) {            
            $("#faturamento_nosso_numero").attr("disabled", true);
        } else {
            $("#faturamento_nosso_numero").attr("disabled", false);
        }
        
    });
    
});

