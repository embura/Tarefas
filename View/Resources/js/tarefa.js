/**
 * Created with JetBrains PhpStorm.
 * User: jefferson
 * Date: 19/05/15
 * Time: 16:11
 * To change this template use File | Settings | File Templates.
 */





$(document).ready(function(){

    $("#btn-submit").click(function(){
        var dados = $('form').serialize();
        var action = $( 'form' ).attr( 'action' );
        $.post( action, dados,function( data ) {
            $("#resultAjax").html( data );
        })
    });


    $('#filter').keyup(function(){
        filterTable($(this).val());
    });

    $('#search').keyup(function(){
        busca($(this).val());
    });

    
});


function finalizaTarefa(idTarefa){
    $.post("actions/finaliza.php",{'idTarefa':idTarefa},function(resposta){
        $("#tarefa_"+idTarefa).html(resposta);
    });
}

function removeTarefa(idTarefa){
    $.post("actions/remove.php",{'idTarefa':idTarefa},function(resposta){
        $("#tarefa_"+idTarefa).hide();
    });
}



function paginacao(){
    var inicio = 0;
    var quantidade = 6;
    var action = "actions/paginacao.php";

    $.post( action, {'inicio':inicio,'quantidade':quantidade},function( data ) {

        //console.log(data);

        var dados = $.parseJSON(data);
        console.log(dados);
        dados.each(function(indece,valor){
            console.log(indece+" - "+valor);
        });
        paginar(dados,inicio,quantidade);
    },'json');
}

function paginar(dados,pagina,tamanhoPagina) {

    $('table > tr').remove();
    var table = $('table');
    for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
        table.append(
            $('<tr>')
                .append($('<td>').append(dados[i][0]))
                .append($('<td>').append(dados[i][1]))
        )
    }
    $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
}

function busca(target){
    $.post( "actions/busca.php", {'search':target},function( data ) {
        $("#lista").html( data );
    })
}

function filterTable(inputVal)
{
    var table = $('#lista');
    table.find('tr').each(function(index, row)
    {
        var allCells = $(row).find('td');
        if(allCells.length > 0)
        {
            var found = false;
            allCells.each(function(index, td)
            {
                var regExp = new RegExp(inputVal, 'i');
                if(regExp.test($(td).text()))
                {
                    found = true;
                    return false;
                }
            });
            if(found == true){
                $(row).show();
            }else{
                $(row).hide();
            }
        }
    });
}




