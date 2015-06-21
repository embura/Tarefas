<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 20/06/2015
 * Time: 12:40
 */

//AutoLoader do Composer
$loader = require __DIR__ . '/vendor/autoload.php';

//vamos adicionar nossas classes ao AutoLoader
//$loader->add('tarefa', __DIR__.'/src');


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$isDevMode = false;

//caminho das entidades
$paths = array(__DIR__ . '/Model/Entity');

// Dados da conexão
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'tarefas',
);

$config = Setup::createConfiguration($isDevMode);


//leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader(), $paths);
$config->setMetadataDriverImpl($driver);

//registra as annotations do Doctrine
AnnotationRegistry::registerFile(__DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');

//cria o entityManager
$em = EntityManager::create($dbParams, $config);