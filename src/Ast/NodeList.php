<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Ast;

/**
 * Class NodeList
 * @package Karma\Platform\Ast
 */
final class NodeList implements \IteratorAggregate
{
    /**
     * @var array|NodeInterface[]
     */
    private $nodes = [];

    /**
     * NodeList constructor.
     * @param iterable|null $nodes
     */
    public function __construct(iterable $nodes = null)
    {
        if ($nodes !== null) {
            foreach ($nodes as $node) {
                $this->add($node);
            }
        }
    }

    /**
     * @param NodeInterface $node
     */
    public function add(NodeInterface $node)
    {
        $this->nodes[] = $node;
    }

    /**
     * @return \Traversable
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->nodes);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getBody();
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        $result = '';

        foreach ($this->nodes as $node) {
            $result .= $node->getBody();
        }

        return $result;
    }
}
