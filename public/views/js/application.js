/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
        
});

/**
 * 
 * @returns {String}
 */
function get_base_url() {    
    if (window.location.host === 'localhost') {
        return "http://" + window.location.host + "/intranet/public/";
    } else {
        return "http://" + window.location.host + "/";
    } 
}

