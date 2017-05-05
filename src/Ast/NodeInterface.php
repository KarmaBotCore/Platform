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
 * Interface NodeInterface
 * @package Karma\Platform\Ast
 */
interface NodeInterface
{
    /**
     * @return string
     */
    public function getBody(): string;
}
