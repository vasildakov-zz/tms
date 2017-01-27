<?php declare(strict_types = 1);
/**
 * This file is part of the vasildakov/tms project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Vasil Dakov <vasildakov@gmail.com>
 * @link https://github.com/vasildakov/tms GitHub
 */

namespace Domain\Entity;

class Payment
{
    private $id;

    private $createdAt;

    public function __construct($id)
    {
        $this->setId($id);
        $this->setCreatedAt(new \DateTimeImmutable('now'));
    }

    private function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    private function setCreatedAt(\DateTimeImmutable $datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }
}