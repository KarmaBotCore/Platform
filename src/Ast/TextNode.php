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
 * Class TextNode
 * @package Karma\Platform\Ast
 */
class TextNode implements NodeInterface
{
    /**
     * @var string
     */
    protected $body;

    /**
     * TextNode constructor.
     * @param string $body
     */
    public function __construct(string $body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getBody();
    }
}
