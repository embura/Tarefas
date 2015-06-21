<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 20/06/2015
 * Time: 16:11
 */
use Symfony\Component\Console\Helper\HelperSet,
    Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper,
    Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper,
    Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'bootstrap.php';


$helperSet = new HelperSet(array(
    'em' => new EntityManagerHelper($em),
    'conn' => new ConnectionHelper($em->getConnection())
));
ConsoleRunner::run($helperSet);