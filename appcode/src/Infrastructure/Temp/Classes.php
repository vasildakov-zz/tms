<?php


$em  = $container->get('doctrine.entity_manager.orm_default');

$tool = $container->get(\Doctrine\ORM\Tools\SchemaTool::class);

$validator = $container->get(\Doctrine\ORM\Tools\SchemaValidator::class);

//var_dump($validator->validateMapping());

$classes = [
    $em->getClassMetadata(\Domain\Entity\Customer::class),
    $em->getClassMetadata(\Domain\Entity\Payment::class),
];

$tool->updateSchema($classes);

exit();
