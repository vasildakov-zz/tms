<?php

// Usage
$classes = [
    $em->getClassMetadata(\Domain\Entity\Customer::class),
    $em->getClassMetadata(\Domain\Entity\Payment::class),
];

$tool->updateSchema($classes);
