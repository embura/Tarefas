<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 25/05/15
 * Time: 10:51
 * To change this template use File | Settings | File Templates.
 */



if(!defined('ROOT_DIR'))
    define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].'/Tarefas/');


require_once ROOT_DIR.'/Model/tarefa.php';
require_once ROOT_DIR.'/DAO/tarefaDao.php';


//echo "<pre>";
$nomeTarefa = $_POST['search'];

$tarefaDao = new tarefaDao();
$tarefas = $tarefaDao->findAll($nomeTarefa);

foreach ( $tarefas as $tarefa ) {
    ?>
    <tr id=tarefa_<?=$tarefa->getID();?>>
        <td><?=$tarefa->getID();?></td>
        <td ><?=$tarefa->getNome();?></td>
        <td>
            <?php if($tarefa->getAtivo() == 1){?>
                <?=($tarefa->getDataFinalizacao());?>
            <?php }else{?>
                <a href="#" onclick="finalizaTarefa(<?=$tarefa->getID();?>)" >Finalizar</a>
            <?php }?>
        </td>
        <td><a href="edita.php?id=<?=$tarefa->getID()?>" >Editar</a></td>
        <td>
            <button href="#" onclick="removeTarefa(<?=$tarefa->getID();?>)" >Remover</button>
        </td>
    </tr>
<?php
}
