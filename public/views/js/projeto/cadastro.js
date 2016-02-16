/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
    $("#proposta_id").change(function(){
        var proposta = $(this).val();
        
        if (proposta === '0') {            
            enable(true);
        } else {
            if (proposta === '') {
                return false;
            } 
            enable(false);
            getProposta(proposta);
        }
        
    });
    
});

function enable(flag) {
    if (flag) {
        $("#cliente_id").attr("disabled", false);
        $("#projeto_horas").attr("readonly", false);
        $("#projeto_valor").attr("readonly", false);
    } else {
        $("#cliente_id").attr("disabled", true);
        $("#projeto_horas").attr("readonly", true);
        $("#projeto_valor").attr("readonly", true);
    }
}

function getProposta(id) {
    $.ajax({
        url: "proposta/ajax-proposta",
        type: "get",
        data: {
            proposta_id: id            
        },
        dataType: "json",
        beforeSend: function() {      
            
        },
        success: function(data) {      
            if (data.success) {
                $("#cliente_id").val(data.proposta.cliente_id);
                $("#projeto_horas").val(data.proposta.proposta_horas);
                $("#projeto_valor").val(data.proposta.proposta_valor);
                $("#projeto_nome").focus();
            }
        },
        error: function(error) {
            
        }
    });
}

