<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Transformer;

use Karma\Platform\Io\UserInterface;

/**
 * Interface ParserInterface
 * @package Karma\Platform\Transformer
 */
interface ParserInterface
{
    /**
     * @param string $html
     * @param \Traversable|UserInterface[] $mentions
     * @return string
     */
    public function parse(string $html, array $mentions): string;
}
