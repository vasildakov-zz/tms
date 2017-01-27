<?php

$validator = new SchemaValidator($entityManager);
$errors = $validator->validateMapping();

if (count($errors) > 0) {
    echo implode("\n\n", $errors);
}
