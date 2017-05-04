<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace KarmaBot\Platform\Support;

/**
 * Interface SubscribableInterface
 * @package KarmaBot\Platform\Support
 */
interface SubscribableInterface
{
    /**
     * @param \Closure $then
     * @return void
     */
    public function subscribe(\Closure $then): void;
}
