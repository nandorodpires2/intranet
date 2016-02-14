/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    $("input[type=radio]").change(function(){
        var value = $(this).val();
        
        if (value === 'PF') {
            $("#cliente_empresa").attr("disabled", true);
            $("#cliente_nome").focus();
        } else {
            $("#cliente_empresa").attr("disabled", false);
            $("#cliente_empresa").focus();
        }
        
    });
    
});
        
        