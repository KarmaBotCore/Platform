<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Io;

/**
 * Interface SubscribeInterface
 * @package KarmaBot\Platform\Io
 */
interface SubscribeInterface
{
    /**
     * @param \Closure $then
     * @return SubscribeInterface
     */
    public function subscribe(\Closure $then): SubscribeInterface;
}
