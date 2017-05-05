<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Ast;

use Karma\Platform\Ast\Transformer\ParserInterface;
use Karma\Platform\Ast\Transformer\RendererInterface;
use Karma\Platform\Io\UserInterface;

/**
 * Class Transformer
 * @package Karma\Platform\Ast
 */
class Transformer implements RendererInterface, ParserInterface
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * Transformer constructor.
     * @param RendererInterface $renderer
     * @param ParserInterface $parser
     */
    public function __construct(RendererInterface $renderer, ParserInterface $parser)
    {
        $this->renderer = $renderer;
        $this->parser = $parser;
    }

    /**
     * @param string $html
     * @param array|UserInterface[] $mentions
     * @return NodeList|NodeInterface[]
     */
    public function parse(string $html, array $mentions): NodeList
    {
        return $this->parser->parse($html, $mentions);
    }

    /**
     * @param NodeList $nodes
     * @return string
     */
    public function render(NodeList $nodes): string
    {
        return $this->renderer->render($nodes);
    }

}
