<?php
$tool = new \Doctrine\ORM\Tools\SchemaTool($em);

$classes = array(
    $em->getClassMetadata('Entities\User'),
    $em->getClassMetadata('Entities\Profile')
);

$tool->createSchema($classes);
