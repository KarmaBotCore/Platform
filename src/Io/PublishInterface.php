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
 * Interface PublishInterface
 * @package KarmaBot\Platform\Io
 */
interface PublishInterface
{
    /**
     * @param string $message
     * @return PublishInterface
     */
    public function publish(string $message): PublishInterface;
}
