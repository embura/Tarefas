/**
 * Created with JetBrains PhpStorm.
 * User: jefferson
 * Date: 19/05/15
 * Time: 16:11
 * To change this template use File | Settings | File Templates.
 */





$(document).ready(function(){

/*    document.querySelector('form input').oninvalid = function(evt) {

        // cancela comportamento padrão do browser
        evt.preventDefault();

        // checa validade e mostra alert
        if (!this.validity.valid) {
            alert("Nome obrigatório!");
        }
    };*/


    $("#btn-submit").click(function(){
        var dados = $('form').serialize();
        var action = $( 'form' ).attr( 'action' );
        $.post( action, dados,function( data ) {
            $("#resultAjax").html( data );
        })
    });





});


function finalizaTarefa(idTarefa){
    $.post("actions/finaliza.php",{'idTarefa':idTarefa},function(resposta){
        $("#tarefa_"+idTarefa).html(resposta);
    // $('.tdDate').filter("#tarefa_"+idTarefa).css( "border-color", "red" );
    });
}

function removeTarefa(idTarefa){
    $.post("actions/remove.php",{'idTarefa':idTarefa},function(resposta){
        $("#tarefa_"+idTarefa).hide();
    });
}




