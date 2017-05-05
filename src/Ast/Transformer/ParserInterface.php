<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Ast\Transformer;

use Karma\Platform\Ast\NodeList;
use Karma\Platform\Io\UserInterface;

/**
 * Interface ParserInterface
 * @package Karma\Platform\Ast\Transformer
 */
interface ParserInterface
{
    /**
     * @param string $html
     * @param array|UserInterface[] $mentions
     * @return NodeList
     */
    public function parse(string $html, array $mentions): NodeList;
}
