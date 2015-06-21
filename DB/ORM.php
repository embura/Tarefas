<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 20/06/2015
 * Time: 12:40
 */

//AutoLoader do Composer
$loader = require '../vendor/autoload.php';

//vamos adicionar nossas classes ao AutoLoader
//$loader->add('tarefa', __DIR__.'/src');


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class orm{
    private $isDevMode;

//caminho das entidades
    private $paths;

// Dados da conexão
    private $dbParams;

    private $config;

    private $driver;

    public static $entityManager ;

    public function __construct(){
        $this->paths = array('../Model');
        $this->isDevMode = false;
        $this->dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'tarefas'
        );

        $this->config = Setup::createConfiguration($this->isDevMode);

        //leitor das annotations das entidades
        $this->driver = new AnnotationDriver(new AnnotationReader(), $this->paths);
        $this->config->setMetadataDriverImpl($this->driver);

        //registra as annotations do Doctrine
        AnnotationRegistry::registerFile('../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
        //$this->entityManger = EntityManager::create($this->dbParams, $this->config);
    }






    public function em(){
        //cria o entityManager
        return EntityManager::create($this->dbParams, $this->config);
    }
}