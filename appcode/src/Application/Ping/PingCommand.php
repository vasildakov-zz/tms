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

namespace Application\Ping;

/**
 * Class PingCommand
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class PingCommand
{
    /**
     * @var string $time
     */
    private $time;

    public function __construct()
    {
        $this->time = time();
    }

    public function time()
    {
        return $this->time;
    }
}
