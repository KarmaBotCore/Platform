<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Support;

/**
 * Trait IdentityMap
 * @package Karma\Platform\Support
 */
trait IdentityMap
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param string $class
     * @param string $id
     * @param \Closure $resolver
     * @return mixed
     */
    protected function fetch(string $class, string $id, \Closure $resolver)
    {
        if (!array_key_exists($id, $this->items[$class] ?? [])) {
            $this->push($class, $id, $resolver());
        }

        return $this->items[$class][$id];
    }

    /**
     * @param string $class
     * @param string $id
     * @param $data
     */
    protected function push(string $class, string $id, $data)
    {
        if (!array_key_exists($class, $this->items)) {
        $this->items[$class] = [];
    }

        $this->items[$class][$id] = $data;
    }

    /**
     * @param string $class
     * @return \Traversable
     */
    protected function identities(string $class): \Traversable
    {
        return new \ArrayIterator($this->items[$class] ?? []);
    }

    /**
     * @param null|string $class
     */
    protected function clearIdentityMap(?string $class): void
    {
        if ($class === null) {
            $this->items = [];
            return;
        }

        $this->items[$class] = [];
    }
}
