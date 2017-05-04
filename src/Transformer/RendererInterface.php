<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Transformer;

/**
 * Interface RenderableInterface
 * @package Karma\Platform\Transformer
 */
interface RendererInterface
{
    /**
     * @param string $internalXml
     * @return string
     */
    public function render(string $internalXml): string;
}