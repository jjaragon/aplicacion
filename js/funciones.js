/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('change', "select[data-role='consultarElectiva']", function() {

    var idElectiva = $('#idElectiva').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: url + '/panel/consultarListado',
        data: {idElectiva: idElectiva},
        beforeSend: function() {
//            Loading.show();
        },
        complete: function(data) {
//            Loading.hide();
        },
        success: function(data) {
                  $("#resultado").html(data);
            
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});