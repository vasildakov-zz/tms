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

namespace Infrastructure\Session\Zend;

use Zend\Session\Container;
use Infrastructure\Session\SessionInterface;

/**
 * Class Session
 *
 * An adapter for \Zend\Session\Container
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Session extends \Zend\Session\Container implements SessionInterface
{
    /**
     * {@inheritDoc}
     */
    public function has($key)
    {
        return self::offsetExists($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        return self::offsetGet($key);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        return self::offsetSet($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function unset($key)
    {
        return self::offsetUnset($key);
    }
}
