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

/**
 * Interface RendererInterface
 * @package Karma\Platform\Ast\Transformer
 */
interface RendererInterface
{
    /**
     * @param NodeList $nodes
     * @return string
     */
    public function render(NodeList $nodes): string;
}
