<?php

namespace Application\Schema;

interface CreateSchemaInterface
{
    public function __invoke(CreateSchemaCommand $command): bool;
}
