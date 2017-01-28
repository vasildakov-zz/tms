<?php
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

// Usage
$classes = [
    $em->getClassMetadata(\Domain\Entity\Customer::class),
    $em->getClassMetadata(\Domain\Entity\Payment::class),
];

$tool->updateSchema($classes);
