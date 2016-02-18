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
    
    $("#cliente").change(function(){
       
        var cliente = $(this).val();
        if (cliente !== '') {
            $("#cliente_id").val(cliente);
        }
        
    });
    
});

function enable(flag) {
    if (flag) {
        $("#cliente").attr("disabled", false);
        $("#projeto_horas").attr("readonly", false);
        $("#projeto_valor").attr("readonly", false);
    } else {
        $("#cliente").attr("disabled", true);
        $("#projeto_horas").attr("readonly", true);
        $("#projeto_valor").attr("readonly", true);
    }
}

function getProposta(id) {
    
    var base_url = get_base_url();
    
    $.ajax({
        url: base_url + "proposta/ajax-proposta",
        type: "get",
        data: {
            proposta_id: id            
        },
        dataType: "json",
        beforeSend: function() {      
            
        },
        success: function(data) {      
            if (data.success) {
                
                $("#cliente").val(data.proposta.cliente_id);
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

