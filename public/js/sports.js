/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    $('.test').click( function (e) {
         $("#test_id").val($(this).data('sportstestid'));
         $("#test_type_id").val($(this).data('testtypeid'));
    });
});

