/**
 * Created with JetBrains PhpStorm.
 * User: jefferson
 * Date: 19/05/15
 * Time: 16:11
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function(){


    $('#adicionaTarefa').click(function(){
        var formData = new FormData(form);

        console.log(formData.attr('action'));

        $.ajax({
            URl: "ajax/adicionaTarefaAjax.php",
            TYPE:'GET',
            DATA:formData,
            success:function(data){
                console.log(data);

            }



        })

    });

});



